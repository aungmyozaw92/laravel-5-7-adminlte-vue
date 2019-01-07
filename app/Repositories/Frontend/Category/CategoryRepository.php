<?php

namespace App\Repositories\Frontend\Category;

/**
 * Interface CategoryRepository
 * @package App\Repositories\Category
 */
interface CategoryRepository
{
    public function findOrThrowException($id);

    public function getAllCategories($order_by = 'is_ordering', $sort = 'asc');

}
