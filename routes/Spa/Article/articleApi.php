<?php

use BasicDashboard\Spa\Articles\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::controller(ArticleController::class)->group(function () {
    Route::post('/article/index', 'index');
    Route::post('/article/detail', 'detail');
    Route::post('/article/add-view-count', 'addViewCount');
    Route::post('/home/index', 'homeIndex');
    Route::post('/home/category', 'homeCategory');
});
