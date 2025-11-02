<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\ApplicationStatus;

class Application extends Model
{
    protected $fillable = [
        'offer_id',
        'user_id',
        'cv_path',
        'status',
    ];

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];

    public function offer(): BelongsTo
    {
        return $this->belongsTo(Offer::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }
}
