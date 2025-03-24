<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BasicDashboard\Foundations\Domain\Settings\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SocialSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data =  [
            [
                'key' => 'Facebook',
                'value' => 'https://web.facebook.com/BuddhishNews',
            ],
            [
                'key' => 'Youtube',
                'value' => 'https://www.youtube.com/@buddhanews',
            ],
            [
                'key' => 'Twitter',
                'value' => 'https://x.com/BuddhishNews',
            ],
            [
                'key' => 'Pinterest',
                'value' => 'https://www.pinterest.com/buddhishnews/',
            ],
            [
                'key' => 'Tiktok',
                'value' => 'https://www.tiktok.com/@buddhishnews',
            ],
            [
                'key' => 'Telegram',
                'value' => 'https://t.me/buddhistnews',
            ],
        ];

        Setting::insert($data);
    }
}
