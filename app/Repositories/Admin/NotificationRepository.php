<?php

namespace App\Repositories\Admin;

use App\Models\Notification;
use App\Repositories\Interfaces\Admin\NotificationInterface;
use DB;
use Sentinel;

class NotificationRepository implements NotificationInterface{


    public function get($id)
    {
        return Notification::find($id);
    }

    public function all()
    {
        return Notification::latest();
    }

    public function statusChange($id)
    {
            $notification           = Notification::find($id);
            $notification->status   = $notification->status == 'seen' ? 'unseen' : 'seen';
            $notification->save();
            return true;
    }

    public function markAllSeen()
    {
            Notification::where('user_id',authId())
                ->where('status','unseen')->update(['status' => 'seen']);
            return true;
    }

    public function seen($id)
    {
        return Notification::where('id',$id)->update(['status' => 'seen']);
    }

    public function remove($id): int
    {
        return Notification::destroy($id);
    }
}
