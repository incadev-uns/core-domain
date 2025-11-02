<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\StrategicContentType;

class StrategicContent extends Model
{
    protected $fillable = [
        'type',
        'content',
    ];

    protected $casts = [
        'type' => StrategicContentType::class,
    ];
}
