<?php

use BasicDashboard\Mobile\SponsorAds\Controllers\SponsorAdController;
use Illuminate\Support\Facades\Route;

Route::controller(SponsorAdController::class)->group(function() {
    Route::post('/sponsor-ads/index', 'index');
});
