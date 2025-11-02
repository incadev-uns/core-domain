<?php

namespace IncadevUns\CoreDomain\Enums;

enum AuditFindingStatus: string
{
    case Open = 'open';
    case InProgress = 'in_progress';
    case Resolved = 'resolved';
    case WontFix = 'wont_fix';

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
