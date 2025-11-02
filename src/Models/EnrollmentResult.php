<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use IncadevUns\CoreDomain\Enums\EnrollmentResultStatus;

class EnrollmentResult extends Model
{
    protected $fillable = [
        'enrollment_id',
        'final_grade',
        'attendance_percentage',
        'status',
    ];

    protected $casts = [
        'final_grade' => 'decimal:2',
        'attendance_percentage' => 'decimal:2',
        'status' => EnrollmentResultStatus::class,
    ];

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }
}
