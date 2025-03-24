<?php

namespace BasicDashboard\Mobile\Countries\Validation;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A CountryDetailRequest is responsible validation of while storing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class CountryDetailRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id' => 'required',
        ];
    }

}
