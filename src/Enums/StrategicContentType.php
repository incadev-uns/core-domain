<?php

namespace IncadevUns\CoreDomain\Enums;

enum StrategicContentType: string
{
    case Mission = 'mission';
    case Vision = 'vision';
    case Values = 'values';
    case Objectives = 'objectives';
    case AboutUs = 'about_us';
    case History = 'history';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
