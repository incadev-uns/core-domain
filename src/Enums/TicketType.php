<?php

namespace IncadevUns\CoreDomain\Enums;

enum TicketType: string
{
    case Technical = 'technical';
    case Academic = 'academic';
    case Administrative = 'administrative';
    case Inquiry = 'inquiry';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
