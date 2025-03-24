<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use BasicDashboard\Foundations\Domain\Categories\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'=>'Home'
        ]);
        for ($x = 1; $x <= 5; $x++) {
            DB::table('categories')->insert([
                'name' => 'ប្រភេទ ' . $x,
                'name_other' => 'Category' . $x,
                'description' => $x . ' Description in Cambodia ... ',
                'description_other' => $x . ' Description in English ... ',
            ]);
        }

    }
}
