<?php

namespace IncadevUns\CoreDomain\Enums;

enum MediaType: string
{
    case Document = 'document';
    case Video = 'video';
    case Audio = 'audio';
    case Image = 'image';
    case Scorm = 'scorm';
    case Link = 'link';
    case Other = 'other';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
