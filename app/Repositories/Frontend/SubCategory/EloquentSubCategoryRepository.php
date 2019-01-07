<?php 
namespace App\Repositories\Admin\SubCategory;

use App\Model\SubCategory;
use App\Model\Category;


class EloquentSubCategoryRepository implements SubCategoryRepository
{

    public function findOrThrowException($id)
    {
        if (! is_null(SubCategory::where('id',$id))) {
           return SubCategory::find($id);
        }

        throw new GeneralException(trans('exceptions.backend.access.category.not_found'));
    }


    public function getAllSubCategories($order_by = 'is_ordering', $sort = 'asc')
    {
      // return SubCategoryCollection::collection(SubCategory::all());
         $subs = SubCategory::orderBy($order_by, $sort)->paginate(10);
         $cat = Category::all();

         $subs = $subs->map(function($sub) use ($cat){
         
            $category = $cat->where('id','=', $sub->category_id)->first();

            $sub->category = $category->name;

            return $sub;
        });

         return $subs;
    }

    public function create($input,$type)
    {
        $sub_category               = new SubCategory;
        $sub_category->name         = $input['name'];
        $sub_category->category_id  = $input['category_id'];
        $sub_category->is_ordering  = $input['is_ordering'];
        $sub_category->slug         = str_slug($input['name']);
        $sub_category->save();
        return true;
    }

    public function update($id, $input)
    {

        $sub_category = $this->findOrThrowException($id);

        if ($sub_category->update($input)) {

          $sub_category->name        = $input['name'];
          $sub_category->category_id = $input['category_id'];
          $sub_category->is_ordering = $input['is_ordering'];
          $sub_category->slug        = str_slug($input['name']);
          $sub_category->save();

          return true;
        }

        throw new GeneralException(trans('exceptions.backend.access.category.update_error'));
    }

    public function destroy($id)
    {

        $sub_category = $this->findOrThrowException($id);

        if ($sub_category->delete()) {
           return true;
        }

    }
    
}


?>