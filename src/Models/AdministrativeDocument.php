<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\MediaType;

class AdministrativeDocument extends Model
{
    protected $fillable = [
        'name',
        'type',
        'path',
        'description',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];
}
