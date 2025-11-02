<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use IncadevUns\CoreDomain\Enums\StaffPaymentType;
use IncadevUns\CoreDomain\Enums\StaffType;

class Contract extends Model
{
    protected $fillable = [
        'user_id',
        'staff_type',
        'payment_type',
        'amount',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'staff_type' => StaffType::class,
        'payment_type' => StaffPaymentType::class,
        'amount' => 'decimal:2',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model', 'App\Models\User'));
    }

    public function payrollExpenses(): HasMany
    {
        return $this->hasMany(PayrollExpense::class);
    }
}
