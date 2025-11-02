<?php

namespace IncadevUns\CoreDomain\Enums;

enum TechAssetStatus: string
{
    case InUse = 'in_use';
    case InStorage = 'in_storage';
    case InRepair = 'in_repair';
    case Disposed = 'disposed';
    case Lost = 'lost';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
