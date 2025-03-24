<?php

namespace BasicDashboard\Mobile\Categories\Resources;

use BasicDashboard\Mobile\Subcategories\Resources\SubcategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A CategoryResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => customEncoder($this->id,10001),
            "name" => $this->name,
            "name_other" => $this->name_other,
            "description" => $this->description,
            "description_other" => $this->description_other,
            "subcategories" => SubcategoryResource::collection($this->subcategories),
        ];
    }
}
