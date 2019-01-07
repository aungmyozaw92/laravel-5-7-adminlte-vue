<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Category\CategoryRepository;

class CategoryController extends Controller
{
    
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category       = $category;
    }

    public function index()
    {
        $categories = $this->category->getAllCategories();
        return response()->json(["categories" => $categories],200);
    }
    
}
