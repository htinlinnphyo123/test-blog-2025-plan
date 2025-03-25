<?php

namespace BasicDashboard\Web\Categories\Validation;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A UpdateCategoryRequest is responsible validation of while updating.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "name" => "max:255|required",
            "description" => "",
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('category.category_name_validation'),
            'name_other.required' => __('category.category_name_other_validation'),
            'description.required' => __('category.category_description_validation'),
            'description_other.required' => __('category.category_description_other_validation'),
        ];
    }
}
