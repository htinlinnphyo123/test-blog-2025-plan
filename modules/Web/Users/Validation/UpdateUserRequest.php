<?php

namespace BasicDashboard\Web\Users\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->offsetUnset('_token');
        $this->offsetUnset('_method');
    }

    public function rules(): array
    {
        return [
            "name" => "required",
            "email" => ["required", "email", Rule::unique('users', 'email')
                ->where(fn($query) => $query->whereNull('deleted_at')
                    ->where('id', '!=', customDecoder($this->id)))],
            "status" => "numeric|required",
            "country_id" => "numeric|required",
            "images.*" => 'image|required',
            "role_id" => "required",
        ];
    }

    protected function passedValidation(): void
    {
        $this->offsetUnset('id');
        if ($this->password) {
            $this->merge([
                'password' => Hash::make($this->password),
            ]);
        } else {
            $this->request->remove('password');
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => __('user.username_validation'),
            'email.required' => __('user.email_validation'),
            'password.required' => __('user.password_validation'),
            'status.required' => __('user._validation'),
            'country_id.required' => __('user.country_id_validation'),
            'role_id.required' => __('user.role_id_validation'),
        ];
    }
}
