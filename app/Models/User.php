<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia, MustVerifyEmail
{
    use Notifiable, HasFactory, Notifiable, HasMediaTrait;

    const USER_TYPE = [
        self::ADMIN => 'Admin',
        self::USER => 'User',
    ];

    const STATUS = [
        self::DEACTIVE => 'Deactive',
        self::ACTIVE => 'Active',
    ];

    const PROFILE = 'profile-pictures';

    const DEACTIVE = 0;
    const ACTIVE = 1;

    const ADMIN = 1;
    const USER = 2;

    const PATH = 'users';

    const LANGUAGES = [
        'en' => 'English',
        'es' => 'Spanish',
        'fr' => 'French',
        'de' => 'German',
        'ru' => 'Russian',
        'pt' => 'Portuguese',
        'ar' => 'Arabic',
        'zh' => 'Chinese',
        'tr' => 'Turkish',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile',
        'is_active',
        'email_verified_at',
        'user_type',
        'email',
        'password',
        'language',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string',
        'mobile' => 'string',
        'email_verified_at' => 'datetime',
    ];

    public static $rules = [
        'first_name' => 'required',
        'last_name'  => 'required',
        'email'      => 'required|email:filter|unique:users,email',
        'password'   => 'required|same:confirm_password|min:8',
    ];

    /**
     * @var array
     */
    public static $messages = [
        'email.regex' => 'Please enter valid email.',
    ];

    /**
     * @var array
     */
    protected $appends = ['full_name', 'avatar', 'image_url'];

    /**
     * @var string[]
     */
    protected $with = ['media'];

    /**
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }

    /**
     * @return mixed
     */
    public function getAvatarAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(User::PROFILE)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }

    /**
     * @return mixed
     */
    public function getImageUrlAttribute()
    {
        /** @var Media $media */
        $media = $this->getMedia(User::PATH)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('assets/images/default_image.jpg');
    }
}
