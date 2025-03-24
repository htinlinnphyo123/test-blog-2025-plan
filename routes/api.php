<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::prefix('v1/mobile')->middleware(['accept.json'])->group(function () {
    require __DIR__ . "/Mobile/Country/countryApi.php";
    require __DIR__ . "/Mobile/Category/categoryApi.php";
    require __DIR__ . "/Mobile/SubCategory/subCategoryApi.php";
    require __DIR__ . "/Mobile/Article/articleApi.php";
    require __DIR__ . "/Mobile/Guest/guestApi.php";
    require __DIR__ . "/Mobile/Page/pageApi.php";
    require __DIR__ . "/Mobile/Notification/notificationApi.php";
    require __DIR__ . "/Mobile/SponsorAd/sponsoradApi.php";
});

Route::prefix('v1/spa')->middleware(['accept.json'])->group(function () {
    require __DIR__ . "/Spa/Category/categoryApi.php";
    require __DIR__ . "/Spa/Article/articleApi.php";
    require __DIR__ . "/Spa/Page/pageApi.php";
    require __DIR__ . "/Spa/SponsorAd/sponsoradApi.php";
});

Route::prefix('v1/mobile')->middleware(['accept.json', 'auth:sanctum'])->group(function () {
    require __DIR__ . "/Mobile/Auth/authApi.php";
});
