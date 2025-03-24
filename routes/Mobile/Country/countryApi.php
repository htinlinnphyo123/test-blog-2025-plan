<?php

use BasicDashboard\Mobile\Countries\Controllers\CountryController;
use Illuminate\Support\Facades\Route;

Route::controller(CountryController::class)->group(function () {
    Route::post('/country/index', 'index');
    Route::post('/country/detail', 'detail');
});
