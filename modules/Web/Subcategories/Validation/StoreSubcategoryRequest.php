<?php

namespace BasicDashboard\Web\Subcategories\Validation;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A StoreSubcategoryRequest is responsible validation of while storing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class StoreSubcategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "max:255|required",
            "category_id" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('subcategory.subcategory_name_validation'),
            'name_other.required' => __('subcategory.subcategory_name_other_validation'),
            'category_id.required' => __('subcategory.category_id_validation'),
        ];
    }
}
