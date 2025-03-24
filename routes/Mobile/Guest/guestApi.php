<?php

use BasicDashboard\Mobile\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/registration-success', 'registrationSuccess');
    Route::post('/check-version','checkAppVersion');
});
