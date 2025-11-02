<?php

namespace IncadevUns\CoreDomain\Enums;

enum EnrollmentResultStatus: string
{
    case Approved = 'approved';
    case Failed = 'failed';
    case Pending = 'pending';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
