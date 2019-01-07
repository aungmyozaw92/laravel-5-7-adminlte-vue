<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Repositories\Admin\Post\PostRepository;

class PostController extends Controller
{
    
    protected $post;

    public function __construct(PostRepository $post)
    {
        $this->middleware('auth:api');
        $this->post       = $post;
    }

    public function index()
    {
        $posts = $this->post->getAllPosts();
        return response()->json(["posts" => $posts],200);
    }

    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all(),'post');
    
        return response()->json($post);
    }


    public function show($id)
    {
        $post = $this->post->findOrThrowException($id);
        return response()->json($post);
    }

    public function update($id,PostRequest $request){
        $post = $this->post->update($id, $request->all());
        return response()->json($post);
    }

    public function approved($id){
        $post = $this->post->approved($id);
        return response()->json($post);
    }

    public function approved_post()
    {
        $posts = $this->post->getAllStatusPosts(true);
        return response()->json(["posts" => $posts],200);
    }

    public function pending_post()
    {
        $posts = $this->post->getAllStatusPosts(false);
        return response()->json(["posts" => $posts],200);
    }

     public function destroy($id)
    {
        $this->post->destroy($id);
        return response()->json('Post has been successfully Delete');
    }
}
