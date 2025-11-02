<?php

namespace IncadevUns\CoreDomain\Enums;

enum OrganizationType: string
{
    case Client = 'client';
    case Partner = 'partner';
    case Vendor = 'vendor';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
