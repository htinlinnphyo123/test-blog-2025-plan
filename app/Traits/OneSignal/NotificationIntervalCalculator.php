<?php

namespace App\Traits\OneSignal;

trait NotificationIntervalCalculator
{
    public function getNotificationInterval(int $sendingInterval,int $totalNum): array
    {
        $times = [];
        $getIntervalHour = $totalNum / $sendingInterval; // for day 24/3 , so the result is 8
        for($i=1;$i<=$sendingInterval;$i++){
            $times[] = (int) ($getIntervalHour * $i); //[8,16,24]
        }
        return $times;
    }
}