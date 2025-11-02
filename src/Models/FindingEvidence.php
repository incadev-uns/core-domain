<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

class FindingEvidence extends Model
{
    protected $fillable = [
        'audit_finding_id',
        'type',
        'path',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function auditFinding(): BelongsTo
    {
        return $this->belongsTo(AuditFinding::class);
    }
}
