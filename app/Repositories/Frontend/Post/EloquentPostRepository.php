<?php 
namespace App\Repositories\Frontend\Post;

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

    public function getPostByCategory($slug,$count)
    {
      
      if ($slug != "hot") {
        $category = Category::where('slug','=',$slug)->first();

        $posts = Post::where('category_id','=',$category->id)->orderBy('created_at', 'desc')->take($count)->get();
      }else{
        $posts = Post::orderBy('view_count', 'desc')->take($count)->get();
      }

          $sub_category = SubCategory::all();
          $posts = $posts->map(function($post) use ($sub_category){
         
            $sub_category = $sub_category->where('id','=', $post->sub_category_id)->first();

            $post->category     = $post->category->name;
            $post->sub_category = $sub_category;
            $post->author         = $post->user->username;

            return $post;
         });

         
         return $posts;
    }

    public function getPostByCount($count)
    {

        $posts = Post::orderBy('created_at', 'desc')->take($count)->get();
      

          $sub_category = SubCategory::all();
          $posts = $posts->map(function($post) use ($sub_category){
         
            $sub_category = $sub_category->where('id','=', $post->sub_category_id)->first();

            $post->category     = $post->category->name;
            $post->sub_category = $sub_category;
            $post->author         = $post->user->username;

            return $post;
         });

         
         return $posts;
    }
    
}


?>