<?php

namespace IncadevUns\CoreDomain\Enums;

enum SurveyEvent: string
{
    case Appointment = 'appointment';
    case Course = 'course';
    case CourseVersion = 'course_version';
    case Group = 'group';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
