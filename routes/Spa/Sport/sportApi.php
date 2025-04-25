<?php

use BasicDashboard\Spa\Sports\Controllers\SportController;
use Illuminate\Support\Facades\Route;

Route::controller(SportController::class)->group(function () {
    Route::post('/sport/index', 'index');
    Route::post('/sport/detail', 'detail');
});
