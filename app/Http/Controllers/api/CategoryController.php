<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Admin\Category\CategoryRepository;

class CategoryController extends Controller
{
    
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->middleware('auth:api');
        $this->category       = $category;
    }

    public function index()
    {
        $categories = $this->category->getAllCategories();
        return response()->json(["categories" => $categories],200);
    }

    public function store(CategoryRequest $request)
    {
        $category = $this->category->create($request->all(),'category');
        return response()->json($category);
    }


    public function show($id)
    {
        $category = $this->category->findOrThrowException($id);
        return response()->json($category);
    }

    public function update($id,CategoryRequest $request){
        $category = $this->category->update($id, $request->all());
        return response()->json($category);

    }

     public function destroy($id)
    {
        $this->category->destroy($id);
        return response()->json('PropertyType has been successfully Delete');
    }
}
