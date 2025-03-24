<?php

use BasicDashboard\Mobile\Categories\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(CategoryController::class)->group(function () {
    Route::post('/category/index', 'index');
    Route::post('/category/detail', 'detail');
});
