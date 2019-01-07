<?php 
namespace App\Repositories\Admin\Post;

use App\Model\Post;
use App\Model\Category;
use App\Model\SubCategory;
use App\User;
use Illuminate\Support\Facades\Auth;

class EloquentPostRepository implements PostRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(Post::where('id',$id))) {
          $post = Post::find($id);

          $post->category = $post->category;
          $post->sub_category = SubCategory::find($post->sub_category_id);
          $post->user = $post->user->username;

          return $post;
        }

        throw new GeneralException(trans('exceptions.backend.access.post.not_found'));
    }


    public function getAllPosts($order_by = 'created_at', $sort = 'asc')
    {
         // return Post::orderBy($order_by, $sort)->paginate(10);

         $posts = Post::orderBy($order_by, $sort)->paginate(10);
         $category = Category::all();
         $sub_category = SubCategory::all();
         $user = User::all();

          $posts = $posts->map(function($post) use ($category,$sub_category,$user){
         
           $category = $category->where('id','=', $post->category_id)->first();
           $sub_category = $sub_category->where('id','=', $post->sub_category_id)->first();
            // $user = $user->where('id','=', $post->user_id)->first();

            $post->category     = $category->name;
            $post->sub_category = $sub_category->name;
            $post->author         = $post->user->username;

            return $post;
         });

         
         return $posts;
    }

    public function create($input,$type)
    {
      $post                  = new Post;
      $post->title           = $input['title'];
      $post->description     = $input['description'];
      $post->user_id         = Auth::id();
      $post->category_id     = $input['category_id'];
      $post->sub_category_id = $input['sub_category_id'];
      $post->slug            = str_slug($input['title']);
      if (Auth::user()->type == "admin") {
        $post->is_approved  = true;
      }

      if($input['image'])
      {
        $image = $input['image'];
        $imageName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($input['image'])->save(public_path('images/').$imageName);
        $post->image = $imageName;
      }

      $post->save();
      return true;
    }

    public function update($id, $input)
    {
        $post = Post::find($id);

        if ($post->update($input)) {

          $post->title           = $input['title'];
          $post->description     = $input['description'];
          $post->user_id         = Auth::id();
          $post->category_id     = $input['category_id'];
          $post->sub_category_id = $input['sub_category_id'];
          $post->slug            = str_slug($input['title']);

          if (Auth::user()->type == "admin") {
            $post->is_approved  = true;
          }

          if($input['image'])
          {
            $image = $input['image'];
            
            if ($image != $post->image) {
               $imageName = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
              \Image::make($input['image'])->save(public_path('images/').$imageName);
              $post->image = $imageName;
            }
            
          }

          $post->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.post.update_error'));
    }

    public function destroy($id)
    {

        $post = $this->findOrThrowException($id);

        if ($post->delete()) {
           return true;
        }
    }

    public function getAllStatusPosts($status)
    {
         // return Post::orderBy($order_by, $sort)->paginate(10);

         $posts = Post::where('is_approved','=',$status)->orderBy('created_at', 'asc')->paginate(10);
         
         $category = Category::all();
         $sub_category = SubCategory::all();
         $user = User::all();

          $posts = $posts->map(function($post) use ($category,$sub_category,$user){
         
           $cat = $category->where('id','=', $post->category_id)->first();
           $sub_cat = $sub_category->where('id','=', $post->sub_category_id)->first();

            $post->category     = $cat->name;
            $post->sub_category = $sub_cat->name;
            $post->author       = $post->user->username;

            return $post;
         });
         
         return $posts;
    }

    public function approved($id)
    {

        $post = Post::find($id);
        if (!$post->is_approved) {
          $post->is_approved     = true;
          $post->save();
        }
        
        return $post;

    }
    
}


?>