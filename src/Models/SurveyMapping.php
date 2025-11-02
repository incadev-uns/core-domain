<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\SurveyEvent;

class SurveyMapping extends Model
{
    protected $fillable = [
        'event',
        'survey_id',
        'description',
    ];

    protected $casts = [
        'event' => SurveyEvent::class,
    ];

    public function survey(): BelongsTo
    {
        return $this->belongsTo(Survey::class);
    }
}
