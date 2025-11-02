<?php

namespace IncadevUns\CoreDomain\Enums;

enum StaffType: string
{
    case Teacher = 'teacher';
    case Support = 'support';
    case Administrator = 'administrator';
    case Coordinator = 'coordinator';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
