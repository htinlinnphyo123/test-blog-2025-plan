<?php
namespace BasicDashboard\Web\Countries\Validation;

use Illuminate\Foundation\Http\FormRequest;

class DeleteCountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->offsetUnset('_token');
        $this->offsetUnset('_method');
        $this->merge(['id' => customDecoder($this->id)]);
    }

    public function rules(): array
    {
        return [
            "id" => ['required', 'unique:users,country_id'],
        ];
    }

    protected function passedValidation(): void
    {
        $this->merge([
            'id' => customEncoder($this->id),
        ]);
    }

    public function messages(): array
    {
        return [
            'id.unique' => __('country.id_validation'),
        ];
    }
}
