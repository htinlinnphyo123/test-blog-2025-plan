<?php

use BasicDashboard\Spa\SponsorAds\Controllers\SponsorAdController;
use Illuminate\Support\Facades\Route;

Route::controller(SponsorAdController::class)->group(function() {
    Route::post('/sponsorAds/index', 'index');
    Route::post('/sponsorAds/detail', 'detail');
});
