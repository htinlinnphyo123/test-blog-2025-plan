<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\OneSignal\NotificationSender;
use App\Traits\OneSignal\NotificationRecordFetcher;
use App\Traits\OneSignal\NotificationIntervalCalculator;

class SendPerMonthNotification extends Command
{
    use NotificationRecordFetcher,NotificationIntervalCalculator,NotificationSender;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-per-month-notification';

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
        $getTotalDaysInCurrentMonth = now()->endOfMonth()->day;
        $getToday = now()->day;
        $notifications = $this->getNotificationRecordFromDB('per_month'); //getNotification
        foreach($notifications['data'] as $notification){
            $times = $this->getNotificationInterval($notification['sending_interval'],$getTotalDaysInCurrentMonth);
            if(in_array($getToday,$times)){
                $this->sendOneSignalNotification($notification,'Total Subscriptions');
            }
        };
    }
}

/**
 * Documentation For Per Month (Test with october)
 * For Per Month
 * Time -> Days that will be sent
 * 5-> [6,12,18,24,31]
 * 7-> [4,8,13,17,22,26,31]
 * 1 -> [31]
 * 6 -> [5,10,15,20,25,31]
 * 4 -> [7,15,2,31]
 */

