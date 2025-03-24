<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomException extends Exception
{
    public function __construct(
        private string $error = ''
    ) {
    }

    public function render(Request $request): Response
    {
        $status = 400;

        return response(["error" => $this->error], $status);
    }

    public function messages()
    {
        return $this->error;
    }
}
