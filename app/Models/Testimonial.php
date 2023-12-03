<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class Testimonial extends Model implements HasMedia
{
    use HasFactory, HasMediaTrait;

    public $table = 'testimonials';
    const PATH = 'testimonials';

    const STATUS = [
        self::DEACTIVE => 'Deactive',
        self::ACTIVE   => 'Active',
    ];

    const DEACTIVE = 0;
    const ACTIVE = 1;

    public $fillable = [
        'name',
        'company',
        'designation',
        'description',
        'is_active',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name'        => 'required',
        'company'     => 'required',
        'designation' => 'required',
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
        $media = $this->getMedia(Testimonial::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }
}
