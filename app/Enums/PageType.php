<?php

namespace App\Enums;

enum PageType:string
{
    case PHOTO = 'photo';
    case VIDEO = 'video';
    case AUDIO = 'audio';
    case PDF = 'pdf';
    case DEFAULT = 'default';

    public static function toArray(): array
    {
        return array_column(PageType::cases(), 'value');
    } 

}

