<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use BasicDashboard\Foundations\Domain\Users\User;
use BasicDashboard\Foundations\Domain\Countries\Country;
use BasicDashboard\Foundations\Domain\Categories\Category;
use BasicDashboard\Foundations\Domain\Subcategories\Subcategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if (env('APP_ENV') === 'production' || env('PROXY_SCHEMA') === 'https') {
            URL::forceScheme('https');
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //To Test Log for database query
        // DB::listen(function ($query) {
        //     \Log::info($query->sql, ['bindings' => $query->bindings, 'time' => $query->time]);


        Storage::macro('generatePresignedUrls', function ($count = 1, $filePath='/default') {
            $links = [];

            for ($i = 0; $i < $count; $i++) {
                $path = $filePath . '/' . Str::random(15);
                $url = Storage::temporaryUploadUrl(
                    $path,
                    now()->addMinutes(20)
                );
                $links[] = [
                    'url' => $url,     // presigned URL
                    'path' => $path,   // path to be stored in the database
                ];
            }

            return $links;
        });

    }

}
