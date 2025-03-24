<?php

namespace App\Enums;

enum SendingFrequency:string 
{
    case PER_DAY = 'per_day';
    case PER_WEEK = 'per_week';
    case PER_MONTH = 'per_month';
    case PER_YEAR = 'per_year';

    public static function toArray(): array
    {
        return array_column(SendingFrequency::cases(), 'value');
    } 
}