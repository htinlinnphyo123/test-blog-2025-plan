<?php

use BasicDashboard\Mobile\Articles\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::controller(ArticleController::class)->group(function () {
    Route::post('/article/index', 'getArticles');
    Route::post('/article/detail', 'detail');
    Route::post('/article/add-view-count','addViewCount');
});