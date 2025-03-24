<?php

namespace BasicDashboard\Web\Notifications\Validation;

use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A DeleteNotificationRequest is responsible validation of id while deleting.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class DeleteNotificationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
          "id"=>"required",
        ];
    }
}
