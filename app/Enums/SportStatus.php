<?php

namespace App\Enums;

enum SportStatus: string
{
    case Live = "1";
    case Highlight = "2";
    public static function toArray(): array
    {
        return array_column(SportStatus::cases(), 'value');
    } 

    public function label(): string
    {
        return match ($this) {
            self::Live => 'Live',
            self::Highlight => 'Highlight',
        };
    }
    public function color(): string
    {
        return match ($this) {
            self::Live => 'bg-red-600',
            self::Highlight => 'bg-yellow-600',
        };
    }

}