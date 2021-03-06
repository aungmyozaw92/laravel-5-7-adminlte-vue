<?php

namespace App\Repositories\Admin\Category;

/**
 * Interface CategoryRepository
 * @package App\Repositories\Category
 */
interface CategoryRepository
{
    public function findOrThrowException($id);

    public function getAllCategories($order_by = 'is_ordering', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
