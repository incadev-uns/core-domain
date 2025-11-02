<?php

namespace IncadevUns\CoreDomain\Enums;

enum StaffPaymentType: string
{
    case Salary = 'salary';
    case Hourly = 'hourly';
    case PerCourse = 'per_course';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
