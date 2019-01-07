<?php

namespace App\Http\Resources\SubCategory;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SubCategoryCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => $this->category,
            'is_ordering' => $this->is_ordering
        ];
    }
}
