<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spin(
        //     message: 'Inserting users to database table...',
        //     callback: fn() => DB::table('users')->insert($this->prepareData())
        // );
        $data = $this->prepareData();
        DB::table('users')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [];
        foreach (range(1, 20) as $a) {
            $insertData[] = [
                'name' => 'NayBaLa' . $a,
                'email' => 'superadmin@gmail' . $a . '.com',
                'password' => Hash::make('1111'),
                'country_id' => rand(1, 200),
                'created_by' => 1,
                'status' => 1,
            ];
        };
        return $insertData;
    }
}
