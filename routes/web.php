<?php

use BasicDashboard\Web\Sports\Controllers\SportController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use BasicDashboard\Web\Auth\Controllers\AuthController;
use BasicDashboard\Web\Pages\Controllers\PageController;
use BasicDashboard\Web\Roles\Controllers\RoleController;
use BasicDashboard\Web\Users\Controllers\UserController;
use BasicDashboard\Web\Audits\Controllers\AuditController;
use BasicDashboard\Web\Articles\Controllers\ArticleController;
use BasicDashboard\Web\Settings\Controllers\SettingController;
use BasicDashboard\Web\Addresses\Controllers\AddressController;
use BasicDashboard\Web\Countries\Controllers\CountryController;
use BasicDashboard\Web\Categories\Controllers\CategoryController;
use BasicDashboard\Web\Currencies\Controllers\CurrencyController;
use BasicDashboard\Web\Dashboard\Controllers\DashboardController;
use BasicDashboard\Web\SponsorAds\Controllers\SponsorAdController;
use BasicDashboard\Web\ContactForms\Controllers\ContactFormController;
use BasicDashboard\Web\Subcategories\Controllers\SubcategoryController;
use BasicDashboard\Web\Notifications\Controllers\NotificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('optimize-hey-yo', function () {
    Artisan::call('optimize:clear');
    return redirect('/');
});

require __DIR__ . "/Web/Guest/guestRoute.php";
require __DIR__ . "/Web/Localization/localizationRoute.php";

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    require __DIR__ . "/Web/User/userRoute.php";

    Route::resource('addresses', AddressController::class);
    Route::resource('audits', AuditController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('subcategories', SubcategoryController::class);
    Route::resource('articles', ArticleController::class);
    Route::get('contactforms', [ContactFormController::class, 'index'])->name('contactForm.index');
    Route::resource('pages', PageController::class);
    Route::resource('sports', SportController::class);
});
Route::post('articles/{id}/send-telegram-notification', [ArticleController::class,'sendTelegramNotification'])->name('articles.sendTelegramNotification');
Route::get('/profile', [UserController::class, 'profile'])->name('userProfile')->middleware('auth');

//for description rich editor toupload to digitalocean directly after user click and upload photo.
Route::post('upload/image', function (Request $request) {
    $path    = $request->path;
    $file    = $request->file('image');
    $url     = uploadImageToDigitalOcean($file, $path); //get file path that store in digitalocean
    // $fullURL = config('filesystems.disks.digitalocean.endpoint') . '/' . $url;
    return response()->json([
        'data' => 'succeess',
        'code' => 200,
        'url'  => Storage::url($url),
    ]);
})->name('uploadImage');

Route::get('hello',function(){
    echo phpinfo();
});