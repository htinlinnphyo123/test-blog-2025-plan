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
            "name_other" => $this->name_other,
            "description" => $this->description,
            "description_other" => $this->description_other,
            "category_id" => $this->category_id,
        ];
    }
}