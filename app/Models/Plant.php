<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Plant extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    public $table = 'plants';
    const PATH = 'plants';

    const STATUS = [
        self::DEACTIVE => 'Deactive',
        self::ACTIVE   => 'Active',
    ];

    const DEACTIVE = 0;
    const ACTIVE = 1;

    const WATER_REQUIREMENT = [
        self::DAILY   => 'Daily',
        self::WEEKLY  => 'Weekly',
        self::MONTHLY => 'Monthly',
        self::YEARLY  => 'Yearly',
    ];

    const DAILY = 0;
    const WEEKLY = 1;
    const MONTHLY = 2;
    const YEARLY = 3;

    const SIZE = [
        self::LARGE  => 'Large',
        self::MEDIUM => 'Medium',
        self::SMALL  => 'Small',
    ];

    const LARGE = 0;
    const MEDIUM = 1;
    const SMALL = 2;

    public $fillable = [
        'plant_type_id',
        'plant_use_id',
        'size',
        'water_requirement',
        'color',
        'plant_specification',
        'name',
        'plant_care',
        'description',
        'is_active',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
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
        $media = $this->getMedia(Plant::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }

    /**
     * @return BelongsTo
     */
    public function plantType(): BelongsTo
    {
        return $this->belongsTo(PlantType::class, 'plant_type_id');
    }

    /**
     * @return BelongsTo
     */
    public function plantUse(): BelongsTo
    {
        return $this->belongsTo(PlantUse::class, 'plant_use_id');
    }
}
