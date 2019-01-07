<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Post\PostRepository;

class PostController extends Controller
{
    
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->post       = $post;
    }

    public function getPostByCategory($slug,$count)
    {

        $posts = $this->post->getPostByCategory($slug,$count);
        return response()->json(["posts" => $posts],200);
    }
    
    public function getPostByCount($count)
    {

        $posts = $this->post->getPostByCount($count);
        return response()->json(["posts" => $posts],200);
    }
}
