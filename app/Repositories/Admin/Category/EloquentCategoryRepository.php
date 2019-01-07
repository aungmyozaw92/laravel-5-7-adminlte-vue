<?php 
namespace App\Repositories\Admin\Category;

use App\Model\Category;
use App\Model\SubCategory;

class EloquentCategoryRepository implements CategoryRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(Category::where('id',$id))) {
           $categories = Category::find($id);
           $sub_cat    = SubCategory::all();
  
            $sub_category = $sub_cat->where('category_id','=', $id);

            $categories->sub_category = $sub_category;

         return $categories;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.not_found'));
    }


    public function getAllCategories($order_by = 'is_ordering', $sort = 'asc')
    {
         // return Category::orderBy($order_by, $sort)->paginate(10);

         $categories = Category::orderBy($order_by, $sort)->paginate(10);
         $sub_cat    = SubCategory::all();

         $categories = $categories->map(function($sub) use ($sub_cat){
         
            $sub_category = $sub_cat->where('category_id','=', $sub->id);

            $sub->sub_category = $sub_category;

            return $sub;
        });

         return $categories;
    }

    public function create($input,$type)
    {
        $category               = new Category;
        $category->name         = $input['name'];
        $category->is_ordering         = $input['is_ordering'];
        $category->slug         = str_slug($input['name']);
        $category->save();
        return true;
    }

    public function update($id, $input)
    {
        $category = Category::find($id);

        if ($category->update($input)) {

          $category->name        = $input['name'];
          $category->is_ordering = $input['is_ordering'];
          $category->slug        = str_slug($input['name']);
          $category->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.update_error'));
    }

    public function destroy($id)
    {

        // $category = $this->findOrThrowException($id);
      $category = Category::find($id);

        if ($category->delete()) {
           return true;
        }

    }
    
}


?>