<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use IncadevUns\CoreDomain\Enums\AuditStatus;

class Audit extends Model
{
    protected $fillable = [
        'auditor_id',
        'audit_date',
        'summary',
        'status',
        'auditable_id',
        'auditable_type',
    ];

    protected $casts = [
        'audit_date' => 'date',
        'status' => AuditStatus::class,
    ];

    public function auditor(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'auditor_id');
    }

    public function auditable(): MorphTo
    {
        return $this->morphTo();
    }

    public function findings(): HasMany
    {
        return $this->hasMany(AuditFinding::class);
    }

    public function actions(): HasManyThrough
    {
        return $this->hasManyThrough(AuditAction::class, AuditFinding::class);
    }
}
