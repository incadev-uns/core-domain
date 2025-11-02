<?php

namespace IncadevUns\CoreDomain\Enums;

enum EnrollmentAcademicStatus: string
{
    case Pending = 'pending';
    case Active = 'active';
    case Completed = 'completed';
    case Failed = 'failed';
    case Dropped = 'dropped';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
