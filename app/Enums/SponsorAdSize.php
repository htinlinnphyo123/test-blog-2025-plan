<?php

namespace App\Enums;

enum SponsorAdSize: string
{
    case Circle = 'Circle';
    case Rectangle = 'Rectangle';
    case Square = 'Square';

    public static function toArray(): array
    {
        return array_column(SponsorAdSize::cases(), 'value');
    }
}
