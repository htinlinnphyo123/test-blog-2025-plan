<?php

namespace BasicDashboard\Web\Roles\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A RoleResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class RoleResource extends JsonResource
{
    public function toArray($request):array
    {
         return [
            "id" => customEncoder($this->id),
            "name"=>$this->name,
        ];
    }
}
