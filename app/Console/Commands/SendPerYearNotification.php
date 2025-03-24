<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\OneSignal\NotificationSender;
use App\Traits\OneSignal\NotificationRecordFetcher;
use App\Traits\OneSignal\NotificationIntervalCalculator;

class SendPerYearNotification extends Command
{
    use NotificationRecordFetcher,NotificationIntervalCalculator,NotificationSender;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-per-year-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): void
    {
        $getThisMonth = now()->month;
        $notifications = $this->getNotificationRecordFromDB('per_year'); //getNotification
        foreach($notifications['data'] as $notification){
            $times = $this->getNotificationInterval($notification['sending_interval'],12);
            if(in_array($getThisMonth,$times)){
                $this->sendOneSignalNotification($notification,'Total Subscriptions');
            }
        };
    }
}