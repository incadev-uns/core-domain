<?php

namespace IncadevUns\CoreDomain\Enums;

enum TechAssetType: string
{
    case Hardware = 'hardware';
    case Software = 'software';
    case License = 'license';
    case Subscription = 'subscription';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
