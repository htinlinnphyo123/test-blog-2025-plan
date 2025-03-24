<?php

namespace Database\Seeders;

use function Laravel\Prompts\progress;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = progress(
            label: 'Inserting demo countries to database table',
            steps: 200,
            callback: fn($user) => $this->prepareData(),
            hint: 'This may take some time...Please wait!'
        );
        DB::table('countries')->insert($data);
    }

    private function prepareData()
    {
        $insertData = [
            'name' => 'Country ' . Str::random(3),
            'zip_code' => Str::random(5),
            'country_code' => Str::random(5),
            'currency_code' => Str::random(5),
        ];
        return $insertData;
    }
}
