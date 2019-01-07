<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoryRequest;
use App\Repositories\Admin\SubCategory\SubCategoryRepository;

class SubCategoryController extends Controller
{
    
    protected $sub_category;

    public function __construct(SubCategoryRepository $sub_category)
    {
        $this->middleware('auth:api');
        $this->sub_category       = $sub_category;
    }

    public function index()
    {
        $subcategories = $this->sub_category->getAllSubCategories();
        return response()->json(["subcategories" => $subcategories],200);
    }

    public function store(SubCategoryRequest $request)
    {
        $sub_category = $this->sub_category->create($request->all(),'sub_category');
        return response()->json($sub_category);
    }


    public function show($id)
    {
        $sub_category = $this->sub_category->findOrThrowException($id);
        return response()->json($sub_category);
    }

    public function update($id,SubCategoryRequest $request){
        $sub_category = $this->sub_category->update($id, $request->all());
        return response()->json($sub_category);

    }

     public function destroy($id)
    {
        $this->sub_category->destroy($id);
        return response()->json('PropertyType has been successfully Delete');
    }
}
