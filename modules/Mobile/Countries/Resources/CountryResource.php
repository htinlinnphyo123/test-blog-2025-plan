<?php

namespace BasicDashboard\Mobile\Countries\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 *
 * A CountryResource is implement for sending data with requirements of desire template.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

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
            "currency_status" => $this->currency_status == 1 ? "Active" : "Inactive",
        ];
    }
}
