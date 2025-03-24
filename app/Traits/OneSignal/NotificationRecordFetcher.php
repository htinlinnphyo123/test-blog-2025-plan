<?php

namespace App\Traits\OneSignal;

use Illuminate\Support\Facades\DB;
use BasicDashboard\Web\Notifications\Resources\NotificationResource;

trait NotificationRecordFetcher
{
    public function getNotificationRecordFromDB($frequency) : array
    {
        $records = DB::table('notifications')
            ->where('sending_frequency',$frequency)
            ->whereNull('deleted_at')
            ->get();
        $notiResource = NotificationResource::collection($records)->response()->getData(true);
        return $notiResource;
    }
}