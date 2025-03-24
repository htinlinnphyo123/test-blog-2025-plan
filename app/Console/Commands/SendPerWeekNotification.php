<?php

namespace App\Console\Commands;

use App\Traits\OneSignal\NotificationIntervalCalculator;
use App\Traits\OneSignal\NotificationRecordFetcher;
use App\Traits\OneSignal\NotificationSender;
use Illuminate\Console\Command;

class SendPerWeekNotification extends Command
{
    use NotificationRecordFetcher,NotificationIntervalCalculator,NotificationSender;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-per-week-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Per Week notification with One signal';

    /**
     * Send Per week notification with one signal.
     * We will consider Sunday Index 1, Monday index 2, .. Sat Index 7
     * @return void
     */
    public function handle(): void
    {
        /**
         * laravel default dayOfWeek is Sun->0 , Mon->1 , Sat->6;
         * Since getNotificationInterval start index 1() . we will add +1 to dayOfWeek
         * So Sun->1 , .. , Sat->7
         */
        $getcurrentDayOfWeek = now()->dayOfWeek + 1;
        $notifications = $this->getNotificationRecordFromDB('per_week'); //getNotification
        foreach($notifications['data'] as $notification){
            $times = $this->getNotificationInterval($notification['sending_interval'],7); //[1,2,3,4,5,6,7]
            if(in_array($getcurrentDayOfWeek,$times)){
                $this->sendOneSignalNotification($notification,'Total Subscriptions');
            }
        };
    }
}

/**
 * [1,2,3,4,5,6,7]
 * ['Sun','Mon','Tue','Wed','Thu','Fri','Sat']
 * 1 time -> [7] => Sat
 * 2 time-> [3,7] => Tue and Sat
 * 3 time-> [2,4,7] => Mon , Wed and Sat
 * 4 time-> [1,3,5,7] => Sun , Tue, Thu and Sat
 * 5 time-> [1,2,4,5,7] 
 * 6 time -> [1,2,3,4,5,7]
 * 7 time -> [1,2,3,4,5,6,7]
 */