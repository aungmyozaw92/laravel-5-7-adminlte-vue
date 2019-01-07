<?php

namespace App\Repositories\Frontend\Post;

/**
 * Interface PostRepository
 * @package App\Repositories\Post
 */
interface PostRepository
{
    public function findOrThrowException($id);

    public function getAllPosts($order_by = 'created_at', $sort = 'asc');

    public function getPostByCategory($slug,$count);

    public function getPostByCount($count);

}
