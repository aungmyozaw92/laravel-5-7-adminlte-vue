<?php

namespace App\Repositories\Admin\Post;

/**
 * Interface PostRepository
 * @package App\Repositories\Post
 */
interface PostRepository
{
    public function findOrThrowException($id);

    public function getAllPosts($order_by = 'created_at', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

    public function approved($id);

    public function getAllStatusPosts($status);

}
