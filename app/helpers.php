<?php

use App\Models\User;
use App\Models\Notification;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

/**
* @return array
*/
function getUserLanguages(): array
{
    return User::LANGUAGES;
}

/**
* @return int
*/
function getLoggedInUserId(): int
{
 return Auth::id();
}

/**
* @return User
*/
function getLoggedInUser(): User
{
 return Auth::user();
}

/**
 * @param  array  $data
 */
function addNotification(array $data)
{
    $notificationRecord = [
        'type'             => $data[0],
        'user_id'          => $data[1],
        'notification_for' => $data[2],
        'title'            => $data[3],
    ];

    Notification::create($notificationRecord);
}

/**
 * @param $role
 *
 * @return Notification[]|Builder[]|Collection
 */
function getNotification($role)
{
    return Notification::whereNotificationFor($role)->where('read_at', null)->where('user_id',
        getLoggedInUserId())->orderByDesc('created_at')->get();
}

/**
 * @param $notificationFor
 *
 * @return string
 */
function getNotificationIcon($notificationFor): string
{
    switch ($notificationFor) {
        case 1:
            return 'fa fa-user';
        case 2:
            return 'fa fa-blog';
        case 3:
            return 'fab fa-linkedin';
        default:
            return 'fa fa-inbox';
    }
}

/**
 * @return mixed
 */
function getPlantTypes()
{
    return \App\Models\PlantType::pluck('name', 'id')->toArray();
}

/**
 * @return mixed
 */
function getPlantUse()
{
    return \App\Models\PlantUse::pluck('name', 'id')->toArray();
}

/**
 * @return mixed
 */
function getSeeds()
{
    return \App\Models\SeedType::pluck('name', 'id')->toArray();
}

/**
 * @return mixed
 */
function getGarden()
{
    return \App\Models\GardenTypes::pluck('name', 'id')->toArray();
}
