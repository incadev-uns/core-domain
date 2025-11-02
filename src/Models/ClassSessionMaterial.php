<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\MediaType;

class ClassSessionMaterial extends Model
{
    protected $fillable = [
        'class_session_id',
        'type',
        'material_url',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function classSession(): BelongsTo
    {
        return $this->belongsTo(ClassSession::class);
    }
}
