<?php

namespace IncadevUns\CoreDomain\Enums;

enum GroupStatus: string
{
    case Pending = 'pending';
    case Enrolling = 'enrolling';
    case Active = 'active';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
