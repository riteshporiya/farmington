<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends AppBaseController
{
    /**
     * @param  Notification  $notification
     *
     * @return JsonResponse
     */
    public function readNotification(Notification $notification): JsonResponse
    {
        $notification->read_at = Carbon::now();
        $notification->save();

        return $this->sendSuccess('Notification read successfully.');
    }
}
