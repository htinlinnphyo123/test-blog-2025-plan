<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Settingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->prepareData();
        DB::table('settings')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [];
        foreach(range(1,5) as $a)
        {
            $insertData[] = [
                'key' => $a.'Key',
                'value' => $a.'Value',
            ];
        };
        return $insertData;
    }
}
