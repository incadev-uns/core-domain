<?php

namespace IncadevUns\CoreDomain\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $provider
 * @property string $disk
 * @property int $public_id
 * @property string $resource_type
 * @property string $format
 * @property string $secure_url
 * @property string $thumbnail_url
 * @property string $folder
 * @property string $original_name
 * @property string $mime_type
 * @property int $bytes
 * @property int $width
 * @property int $height
 *
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument wherePublicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereResourceType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereFormat($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereSecureUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereThumbnailUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereFolder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereOriginalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereMimeType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereMimeBytes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereMimeWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereMimeHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereMimeMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StrategicDocument whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class MediaFile extends Model
{
    protected $fillable = [
        'provider',
        'disk',
        'public_id',
        'resource_type',
        'format',
        'secure_url',
        'thumbnail_url',
        'folder',
        'original_name',
        'mime_type',
        'bytes',
        'width',
        'height',
        'meta',
        'uploaded_by',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
