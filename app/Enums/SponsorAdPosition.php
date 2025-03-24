<?php

namespace App\Enums;

enum SponsorAdPosition: string
{
    case Header = 'Header';
    case Center = 'Center';
    case Footer = 'Footer Sticky';
    case Video_Section = 'Video_Section';
    case Detail_Page = 'Detail_Page';

    public static function toArray(): array
    {
        return array_column(SponsorAdPosition::cases(), 'value');
    }
}
