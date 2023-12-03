<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

/**
 * Class Post
 * @package App\Models
 * @version April 19, 2021, 3:28 pm UTC
 *
 * @property string $title
 * @property string $description
 */
class Post extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    public $table = 'posts';
    const PATH = 'posts';

    public $fillable = [
        'title',
        'user_id',
        'description',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    /**
     * @var array
     */
    protected $appends = ['image_url'];

    /**
     * @var string[]
     */
    protected $with = ['media'];

    /**
     * @return string
     */
    public function getImageUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(Post::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
