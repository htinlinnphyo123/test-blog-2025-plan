<?php

namespace BasicDashboard\Web\Settings\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A SettingResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class SettingResource extends JsonResource
{
    public function toArray($request):array
    {
         return [
            "id" =>customEncoder($this->id),
            "key"=>$this->key,
            "value"=>$this->value,
        ];
    }
}
