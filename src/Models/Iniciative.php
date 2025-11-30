<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property int $plan_id
 * @property string $sumary
 * @property int $user_id
 * @property string $status
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property string $estimated_impact
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereTitle()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative wherePlanId()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereSummary()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereUserId()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereStatus()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereStartDate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereEndDate()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Iniciative whereEstimatedImpact()
 *
 * @mixin \Eloquent
 */
class Iniciative extends Model
{
    use HasFactory;

    protected $table = 'iniciatives';

    protected $fillable = [
        'title',
        'plan_id',
        'summary',
        'user_id',
        'status',
        'start_date',
        'end_date',
        'estimated_impact',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function plan()
    {
        return $this->belongsTo(StrategicPlan::class, 'plan_id');
    }

    public function user()
    {
        $userModel = config('auth.providers.users.model', 'App\Models\User');

        return $this->belongsTo($userModel, 'user_id');
    }

    public function evaluations()
    {
        return $this->hasMany(IniciativeEvaluation::class, 'iniciative_id');
    }
}
