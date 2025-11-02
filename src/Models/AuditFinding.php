<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\AuditFindingStatus;
use IncadevUns\CoreDomain\Enums\SeverityLevel;

class AuditFinding extends Model
{
    protected $fillable = [
        'audit_id',
        'description',
        'severity',
        'status',
    ];

    protected $casts = [
        'severity' => SeverityLevel::class,
        'status' => AuditFindingStatus::class,
    ];

    public function audit(): BelongsTo
    {
        return $this->belongsTo(Audit::class);
    }

    public function evidences(): HasMany
    {
        return $this->hasMany(FindingEvidence::class);
    }

    public function actions(): HasMany
    {
        return $this->hasMany(AuditAction::class);
    }
}
