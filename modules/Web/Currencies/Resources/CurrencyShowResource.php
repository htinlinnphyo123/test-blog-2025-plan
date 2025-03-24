<?php

namespace BasicDashboard\Web\Currencies\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyShowResource extends JsonResource
{
    public function toArray($request):array
    {
        return[
            "id" => customEncoder($this->id),
            "rate"=>$this->rate,
            "country_id"=>$this->country_id->name,
            "date"=>$this->date,
            "time"=>$this->time,
        ];
    }
}