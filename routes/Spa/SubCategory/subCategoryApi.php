<?php

use BasicDashboard\Spa\Subcategories\Controllers\SubcategoryController;
use Illuminate\Support\Facades\Route;

Route::controller(SubcategoryController::class)->group(function () {
    Route::post('/subcategory/index', 'getSubCategories');
    Route::post('/subcategory/detail', 'detail');
});
