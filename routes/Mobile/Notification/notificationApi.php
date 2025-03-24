<?php

use Illuminate\Support\Facades\Route;
use BasicDashboard\Mobile\Notifications\Controllers\NotificationController;

Route::controller(NotificationController::class)->group(function(){
    Route::post('/notification/index','index');
    Route::post('/notification/detail','show');
});