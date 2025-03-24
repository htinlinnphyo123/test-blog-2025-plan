<?php

namespace App\Traits\OneSignal;

use Ladumor\OneSignal\OneSignal;

trait NotificationSender
{
    public function sendOneSignalNotification(array $notification,$segment='Total Subscriptions')
    {
        $imageUrl = $notification['uploaded_photo'];
        $fields = [
            'included_segments' => $segment,
            'chrome_web_image' => $imageUrl, //Chrome web push. Windows and Android only.
            'chrome_web_icon' => $imageUrl, //Chrome web push
            'chrome_big_picture' => $imageUrl, //Chrome Apps
            'chrome_web_badge' => $imageUrl, //Chrome web push. Android only.
            'chrome_icon' => $imageUrl, //Chrome app
            'firefox_icon' => $imageUrl, //Firefox web push            
            'huawei_big_picture' => $imageUrl, //Huawei
            'huawei_small_icon' => $imageUrl, //Huawei
            'huawei_large_icon' => $imageUrl, //Huawei
            'adm_big_picture' => $imageUrl, //Amazon
            'adm_small_icon' => $imageUrl, //Amazon
            'adm_large_icon' => $imageUrl, //Huawei 
            'big_picture' => $imageUrl, //Android           
            'small_icon' => $imageUrl, //Android            
            'large_icon' => $imageUrl, //Android 
            'data' => $notification
        ];
        $notiInfo = OneSignal::sendPush($fields,$notification['title'] . $notification['body']);
        \Log::info($notiInfo);
    }
}