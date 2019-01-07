<?php

namespace App\Repositories\Admin\SubCategory;

/**
 * Interface SubCategoryRepository
 * @package App\Repositories\SubCategory
 */
interface SubCategoryRepository
{
    public function findOrThrowException($id);

    public function getAllSubCategories($order_by = 'is_ordering', $sort = 'asc');

    public function create($input,$type);

    public function destroy($id);

    public function update($id, $input);

}
