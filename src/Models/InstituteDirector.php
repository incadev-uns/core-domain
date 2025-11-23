<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property string|null $name
 * @property string|null $signature
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \IncadevUns\CoreDomain\Models\Certificate> $certificates
 * @property-read int|null $certificates_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|InstituteDirector whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class InstituteDirector extends Model
{
    protected $fillable = [
        'name',
        'signature',
    ];

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'director_id');
    }
}
