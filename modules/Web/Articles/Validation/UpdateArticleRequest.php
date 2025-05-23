<?php

namespace BasicDashboard\Web\Articles\Validation;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

/**
 *
 * A UpdateArticleRequest is responsible validation of while updating.
 * Generated By Custom Artisan Cmd
 * @author Nay Ba la
 * https://github.com/naybala
 * https://naybala.netlify.app/
 *
 */

class UpdateArticleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            "title" => "required",
        ];
    }

    protected function passedValidation(): void
    {
        if ($this->date != null) {
            $this->merge([
                'date' => transform($this->date, fn() => Carbon::createFromFormat('m/d/Y', $this->date)->format('Y-m-d'))
                . ' ' . $this->time . ':00',
            ]);
        }
        $this->offsetUnset('time');
    }
}
