<?php

namespace App\Enums;

enum Platform:string
{
    case Web = 'Web';
    case Mobile = 'Mobile';

    public static function toArray(): array
    {
        return array_column(Platform::cases(), 'value');
    } 

}

