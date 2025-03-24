<?php

namespace Database\Seeders;

use App\Enums\ArticleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ArticleType::cases();
        for($i=1;$i<100;$i++){
            $subcategory_id = rand(1,20);
            $subcategory = Subcategory::find($subcategory_id);
            $category_id = $subcategory->category->id;
            DB::table("articles")->insert([
                'title' => 'Article' . $i,
                'title_other' => 'article ' . $i, 
                'description' => 'Description ' . $i,
                'description_other' => 'Description ' . $i,
                'type' => $types[array_rand($types)],
                'category_id' => $category_id,
                'subcategory_id' => $subcategory_id,
                'date' => fake()->date,
                'is_published' => fake()->boolean,
                'created_by' => 1,
                'created_at' => now(),
            ]); 
        }
    }
}
