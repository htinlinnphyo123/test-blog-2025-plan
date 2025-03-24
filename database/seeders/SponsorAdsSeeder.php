<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SponsorAdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->prepareData();
        DB::table('sponsor_ads')->insert($data);
    }
    private function prepareData()
    {
        $insertData = [];
        foreach(range(1,20) as $a){
            $insertData[] = [
                'name' => 'Ads' . $a,
                'description' => 'This is Description' . $a,
                'status' => 1,

            ];
        };
        return $insertData;
    }
}
