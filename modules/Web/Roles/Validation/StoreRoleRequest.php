<?php

namespace BasicDashboard\Web\Roles\Validation;

use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A StoreRoleRequest is responsible validation of while storing.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class StoreRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $this->offsetUnset('_token');
        $removeName = array_slice($this->all(),1); //remove 'Name' key
        $getKeys = array_keys($removeName); // get array [p_1,p_2]
        $arrayWithId = array_map(function($value){
            return substr($value,2);
        },$getKeys); // [1,2]
        $permissions = Permission::whereIn('id',$arrayWithId)->pluck('name')->toArray(); // ['manage users','create users']
        $this->merge([
            'permissions' => $permissions
        ]);
    }

    public function rules(): array
    {
        return [
            "name"=>"required|max:255",
            "permissions" =>"required"
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'permissions.required' =>  __('role.permission_validation'),
            'name.required' => __('role.role_name_validation'),
        ];
    }
    
}
