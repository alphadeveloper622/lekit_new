<?php

namespace App\Traits;
use App\Events\PusherNotification;
use App\Models\Notification;
trait SendNotification{
    function sendNotification($user, $message = null, $message_type = 'success', $url = null, $details = null)
    {

        if($user)
        {
            $notification = new Notification();
            $notification->user_id = $user->id;
            $notification->title = $message;
            $notification->details = $details;
            $notification->url = $url;
            $notification->save();
        }

        try {
            if (settingHelper('is_pusher_notification_active') == 1):
                event(new PusherNotification($user, $message, $message_type, $url, $details));
            endif;
        } catch (\Exception $e) {

        }
        return true;
    }
}
