<?php
namespace BasicDashboard\Web\Countries\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id" => customEncoder($this->id),
            "name" => $this->name,
            "zip_code" => $this->zip_code,
            "country_code" => $this->country_code,
            "currency_code" => $this->currency_code,
            "currency_status" => $this->currency_status,
            "measure" => $this->measure,
            "measure_unit" => $this->measure_unit,
            "image" => "https://assets.justinmind.com/wp-content/uploads/2018/11/Lorem-Ipsum-alternatives-768x492.png",
        ];
    }
}
