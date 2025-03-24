<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->prepareData();
        DB::table('notifications')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [];
        foreach(range(1,20) as $n)
        {
            $insertData[] = [
                'title' => 'Noti' . $n,
                'body' => 'Today is ' . $n,
                'created_at' => now(),
            ];
        };
        return $insertData;
    }
}
