<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $inicative_id
 * @property int $evaluartor_user
 * @property float $score
 * @property int $document_id
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation whereIniciativeId()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation whereEvaluatorUser()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation whereScore()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|IniciativeEvaluation whereDocumentId()
 *
 * @mixin \Eloquent
 */
class IniciativeEvaluation extends Model
{
    use HasFactory;

    protected $table = 'iniciative_evaluations';

    protected $fillable = [
        'iniciative_id',
        'evaluator_user',
        'summary',
        'score',
        'document_id',
    ];

    protected $casts = [
        'score' => 'decimal:2',
    ];

    public function iniciative()
    {
        return $this->belongsTo(Iniciative::class, 'iniciative_id');
    }

    public function evaluator()
    {
        $userModel = config('auth.providers.users.model', 'App\Models\User');

        return $this->belongsTo($userModel, 'evaluator_user');
    }

    public function document()
    {
        return $this->belongsTo(StrategicDocument::class, 'document_id');
    }
}
