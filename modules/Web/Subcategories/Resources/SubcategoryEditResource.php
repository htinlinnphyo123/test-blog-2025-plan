<?php

namespace BasicDashboard\Web\Subcategories\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryEditResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return[
            "id" => customEncoder($this->id),
            "name" => $this->name,
            "description" => $this->description,
            "category_id" => $this->category_id,
        ];
    }
}