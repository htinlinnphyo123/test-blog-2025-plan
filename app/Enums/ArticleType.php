<?php

namespace App\Enums;

enum ArticleType:string
{
    case PHOTO = 'photo';
    case VIDEO = 'video';
    case AUDIO = 'audio';
    case DEFAULT = 'default';

    public static function toArray(): array
    {
        return array_column(ArticleType::cases(), 'value');
    } 

}

