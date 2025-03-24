<?php
namespace BasicDashboard\Web\Countries\Validation;

use Illuminate\Foundation\Http\FormRequest;
use messages;

class StoreCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "required",
            "zip_code" => "",
            "country_code" => "",
            "currency_code" => "",
            "measure" => "",
            "measure_unit" => "",
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         'name.required' => __('country.name_validation'),
    //         'zip_code.required' => __('country.zip_code_validation'),
    //         'country_code.required' => __('country.country_code_validation'),
    //         'currency_code.required' => __('country.currency_code_validation'),
    //     ];
    // }

    public function messages(): array
    {
        return [
            'name.required' => __('country.country_name_validation'),
            'zip_code.required' => __('country.zip_code_validation'),
            'country_code.required' => __('country.country_code_validation'),
            'currency_code.required' => __('country.currency_code_validation'),
        ];
    }

}
