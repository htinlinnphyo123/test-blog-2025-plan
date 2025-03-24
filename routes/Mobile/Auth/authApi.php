<?php

use BasicDashboard\Mobile\Auth\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/id-encrypt', 'idEncrypt');
    Route::post('/id-decrypt', 'idDecrypt');

});
