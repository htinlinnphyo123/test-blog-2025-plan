<?php

use Illuminate\Support\Facades\Route;
use BasicDashboard\Spa\Pages\Controllers\PageController;

Route::controller(PageController::class)->group(function(){
    Route::post('/page/index','index');
    Route::post('/page/detail','show');
    Route::post('/page/footer','footerIndex');
});