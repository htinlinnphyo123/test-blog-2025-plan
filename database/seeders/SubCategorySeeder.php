<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($x = 1; $x <= 25; $x++) {
            DB::table('subcategories')->insert([
                'name' => 'Subcategory ' . $x,
                'name_other' => 'ប្រភេទ ' . $x,
                'description' => $x . ' Description in English ... ',
                'description_other' => $x . ' Description in Cambodia ... ',
                'category_id' => rand(1, 5),
            ]);
        }
    }
}
