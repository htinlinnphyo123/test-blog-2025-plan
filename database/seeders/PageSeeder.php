<?php

namespace Database\Seeders;

use App\Enums\ArticleType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = $this->prepareData();
        DB::table("pages")->insert($data);
    }
    
    private function prepareData()
    {
        $types = ArticleType::cases();
        $insertData = [];
        for($i=1;$i<100;$i++){
            $insertData[] = [
                'title' => 'Article' . $i,
                'title_other' => 'article ' . $i, 
                'description' => 'Description ' . $i,
                'description_other' => 'Description ' . $i,
                'type' => $types[array_rand($types)],
                'date' => fake()->date,
                'is_published' => fake()->boolean,
                'created_by' => 1,
            ];
        };
        return $insertData;
    }
}
