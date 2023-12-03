<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Garden extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    public $table = 'gardens';
    const PATH = 'gardens';

    const STATUS = [
        self::DEACTIVE => 'Deactive',
        self::ACTIVE   => 'Active',
    ];

    const DEACTIVE = 0;
    const ACTIVE = 1;

    protected $fillable = [
        'garden_type_id',
        'name',
        'garden_care',
        'description',
        'is_active',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    static $rules = [
        'name' => 'required',
        'garden_type_id' => 'required',
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
        $media = $this->getMedia(Garden::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }

    /**
     * @return BelongsTo
     */
    public function gardenType(): BelongsTo
    {
        return $this->belongsTo(GardenTypes::class, 'garden_type_id');
    }
}
