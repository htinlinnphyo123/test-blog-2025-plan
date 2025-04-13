<?php

use Illuminate\Support\Facades\Route;
use BasicDashboard\Spa\ContactForm\Controllers\ContactFormController;

Route::prefix('v1/spa')->middleware(['accept.json'])->group(function () {
    // require __DIR__ . "/Spa/Category/categoryApi.php";
    require __DIR__ . "/Spa/Article/articleApi.php";
    Route::post('contactforms', [ContactFormController::class, 'store'])->name('contactForm.store');
});