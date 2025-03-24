<?php

namespace BasicDashboard\Web\Users\Validation;

use Illuminate\Foundation\Http\FormRequest;

class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "id" => "required",
            "role_name" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            'role_name.required' => __('user.role_id_validation'),
        ];
    }
}
