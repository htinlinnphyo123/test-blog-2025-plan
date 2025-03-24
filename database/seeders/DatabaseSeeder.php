<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CountrySeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            AddressSeeder::class,
            CategorySeeder::class,
            SubCategorySeeder::class,
            Settingseeder::class,
            ArticleSeeder::class,
            NotificationSeeder::class,
            PageSeeder::class,
            SponsorAdsSeeder::class,
        ]);
    }
}
