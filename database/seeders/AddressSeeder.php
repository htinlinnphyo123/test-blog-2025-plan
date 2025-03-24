<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->prepareData();
        DB::table('addresses')->insert($data);
    }
    private function prepareData()
    {
        $insertData = [];
        foreach (range(1, 50) as $a) {
            $insertData[] = [
                'level1_code' => 'Province ' . $a . 'Code',
                'level1_name' => 'Province ' . $a . 'Name',
                'level2_code' => 'Township ' . $a . 'Code',
                'level2_name' => 'Township ' . $a . 'Name',
                'level3_code' => 'City ' . $a . 'Code',
                'level3_name' => 'City ' . $a . 'Name',
                'level4_code' => 'Village ' . $a . 'Code',
                'level4_name' => 'Village ' . $a . 'Name',
                'level5_code' => 'L' . $a . 'Code',
                'level5_name' => 'L' . $a . 'Name',
                'level6_code' => 'L' . $a . 'Code',
                'level6_name' => 'L' . $a . 'Name',
                'level7_code' => 'L' . $a . 'Code',
                'level7_name' => 'L' . $a . 'Name',
                'country_id' => '1',
            ];
        };
        return $insertData;
    }
}
