<?php

namespace App\Console\Commands;

use App\Traits\OneSignal\NotificationIntervalCalculator;
use App\Traits\OneSignal\NotificationRecordFetcher;
use App\Traits\OneSignal\NotificationSender;
use Illuminate\Console\Command;

class SendPerDayNotification extends Command
{
    use NotificationIntervalCalculator,NotificationRecordFetcher,NotificationSender;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-per-day-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Per Daily Notification with One Signal';

    /**
     * Check the notification per hour and send
     * For example, i will show with 3 sending_interval per day
     * @return void
     */
    public function handle()
    {
        $getHour = now()->format('H'); 
        $notifications = $this->getNotificationRecordFromDB('per_day'); //getNotification
        foreach($notifications['data'] as $notification){
            $times = $this->getNotificationInterval($notification['sending_interval'],24); //this will get [8,16,24]
            if(in_array($getHour,$times)){
                $this->sendOneSignalNotification($notification,'Total Subscriptions');
            }
        };
    }



}
