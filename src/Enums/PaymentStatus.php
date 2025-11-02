<?php

namespace IncadevUns\CoreDomain\Enums;

enum PaymentStatus: string
{
    case Pending = 'pending';
    case Paid = 'paid';
    case PartiallyPaid = 'partially_paid';
    case Refunded = 'refunded';
    case Cancelled = 'cancelled';
    case Overdue = 'overdue';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
