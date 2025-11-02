<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use IncadevUns\CoreDomain\Enums\EnrollmentAcademicStatus;
use IncadevUns\CoreDomain\Enums\PaymentStatus;

class Enrollment extends Model
{
    protected $fillable = [
        'group_id',
        'user_id',
        'payment_status',
        'academic_status',
    ];

    protected $casts = [
        'payment_status' => PaymentStatus::class,
        'academic_status' => EnrollmentAcademicStatus::class,
    ];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function attendances(): HasMany
    {
        return $this->hasMany(Attendance::class);
    }

    public function grades(): HasMany
    {
        return $this->hasMany(Grade::class);
    }

    public function payments(): HasMany
    {
        return $this->hasMany(EnrollmentPayment::class);
    }

    public function result(): HasOne
    {
        return $this->hasOne(EnrollmentResult::class);
    }
}
