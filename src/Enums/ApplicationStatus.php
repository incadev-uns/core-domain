<?php

namespace IncadevUns\CoreDomain\Enums;

enum ApplicationStatus: string
{
    case Pending = 'pending';
    case UnderReview = 'under_review';
    case Shortlisted = 'shortlisted';
    case Rejected = 'rejected';
    case Hired = 'hired';
    case Withdrawn = 'withdrawn';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
