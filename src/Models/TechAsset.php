<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\TechAssetStatus;
use IncadevUns\CoreDomain\Enums\TechAssetType;

class TechAsset extends Model
{
    protected $fillable = [
        'name',
        'type',
        'status',
        'user_id',
        'acquisition_date',
        'expiration_date',
    ];

    protected $casts = [
        'type' => TechAssetType::class,
        'status' => TechAssetStatus::class,
        'acquisition_date' => 'date',
        'expiration_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }
}
