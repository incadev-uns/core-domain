<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\MediaType;

class StrategicDocument extends Model
{
    protected $fillable = [
        'name',
        'path',
        'type',
        'description',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];
}
