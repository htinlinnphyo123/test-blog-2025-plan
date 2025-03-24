<?php

namespace BasicDashboard\Web\Addresses\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressEditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => customEncoder($this->id),
            "level1_code" => $this->level1_code,
            "level1_name" => $this->level1_name,
            "level2_code" => $this->level2_code,
            "level2_name" => $this->level2_name,
            "level3_code" => $this->level3_code,
            "level3_name" => $this->level3_name,
            "level4_code" => $this->level4_code,
            "level4_name" => $this->level4_name,
            "level5_code" => $this->level5_code,
            "level5_name" => $this->level5_name,
            "level6_code" => $this->level6_code,
            "level6_name" => $this->level6_name,
            "level7_code" => $this->level7_code,
            "level7_name" => $this->level7_name,
            "country_id" => $this->country_id,
        ];
    }
}
