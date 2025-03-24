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
        // });
        //$this->shareCountryDataUsingChunk();
        //$this->shareCountryDataUsingCursor();
        View::share('viewCountries', Country::all(['id', 'name']));
        View::share('viewRoles', Role::all(['id', 'name']));
        View::share('viewCategories', Category::all(['id', 'name']));
        View::share('viewSubcategories', Subcategory::all(['id', 'name', 'category_id']));
        View::share('viewUsers', User::all(['id', 'name']));
        //View::share('getAllPermissions', $this->getFormattedPermissions());

        Storage::macro('generatePresignedUrls', function ($count = 1, $filePath) {
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

    // protected function getFormattedPermissions(): array
    // {
    //     $features = config('numbers.permissions'); //['users','countries','audits','roles']
    //     $permissions = Permission::orderBy('id', 'asc')->get(['id', 'name'])->toArray(); //['manage users',...] All permissions
    //     $finalPermissions = [];
    //     foreach ($features as $feature) {
    //         $finalPermissions[$feature] = array_filter($permissions, function ($permission) use ($feature) {
    //             return str_contains($permission['name'], $feature); //str_contains('manage users','users')
    //         });
    //     }
    //     return $finalPermissions;
    // }

    //Chunk
    protected function shareCountryDataUsingChunk()
    {
        $data = [];
        Country::chunk(500, function ($items) use (&$data) {
            foreach ($items as $item) {
                $data[] = [
                    'id' => $item->id,
                    'name' => $item->name,
                ];
            }
        });
        View::share('viewCountries', $data);
    }

    //Cursor
    protected function shareCountryDataUsingCursor()
    {
        $data = [];
        foreach (Country::cursor() as $item) {
            $data[] = [
                'id' => $item->id,
                'name' => $item->name,
            ];
            if (count($data) >= 100000) {
                break;
            }
        }
        View::share('viewCountries', $data);
    }
}
