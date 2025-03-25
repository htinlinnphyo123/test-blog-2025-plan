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
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('1111'),
        ]);
    }
}
