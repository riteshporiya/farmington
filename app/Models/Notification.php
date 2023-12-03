<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Notification
 *
 * @property int $id
 * @property int $type
 * @property int $notification_for
 * @property int $user_id
 * @property string $title
 * @property mixed|null $text
 * @property string|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification query()
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereNotificationFor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereReadAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereUserId($value)
 * @mixin \Eloquent
 * @property array|null $meta
 * @property-read string $notification_for_text
 * @method static \Illuminate\Database\Eloquent\Builder|Notification whereMeta($value)
 */
class Notification extends Model
{
    use HasFactory;

    public $table = "notifications";

    public $fillable = [
        'type',
        'notification_for',
        'user_id',
        'title',
        'text',
        'meta',
        'read_at',
    ];

    protected $casts = [
        'type'             => 'integer',
        'notification_for' => 'integer',
        'user_id'          => 'integer',
        'title'            => 'string',
        'text'             => 'text',
        'meta'             => 'array',
    ];

    const ADMIN = 1;
    const USERS = 2;

    const notificationType = [
        self::REGISTER_USER  => 'REGISTER USER',
        self::BLOG_CREATE    => 'BLOG CREATE',
        self::INQUIRY_CREATE => 'INQUIRY CREATE',
    ];

    const REGISTER_USER = 1;
    const BLOG_CREATE = 2;
    const INQUIRY_CREATE = 3;

    /**
     *
     * @return string
     */
    public function getNotificationForTextAttribute(): string
    {
        if (! empty($this->type)) {
            return self::notificationType[$this->type];
        }
    }
}
