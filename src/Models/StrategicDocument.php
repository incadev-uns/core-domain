<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;
use IncadevUns\CoreDomain\Enums\MediaType;

/**
 * @property int $id
 * @property int $fileId
 * @property string $name
 * @property string $category
 * @property MediaType|null $type
 * @property string|null $description
 * @property string $visibility
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereVisibility($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class StrategicDocument extends Model
{
    protected $fillable = [
        'file_id',
        'name',
        'type',
        'category',
        'description',
        'visibility',
    ];

    protected $casts = [
        'type' => MediaType::class,
    ];

    public function user()
    {
        $userModel = config('auth.providers.users.model', 'App\Models\User');

        return $this->belongsTo($userModel, 'uploaded_by');
    }

    public function file()
    {
        return $this->belongsTo(MediaFile::class, 'file_id');
    }
}
