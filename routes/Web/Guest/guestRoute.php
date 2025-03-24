<?php


use Illuminate\Support\Facades\Route;
use BasicDashboard\Web\Auth\Controllers\AuthController;
use BasicDashboard\Web\Users\Controllers\UserController;
use BasicDashboard\Web\Notifications\Controllers\NotificationController;
use BasicDashboard\Web\Articles\Controllers\ArticleController;
use BasicDashboard\Web\SponsorAds\Controllers\SponsorAdController;

Route::get('/login', [AuthController::class, 'login'])->name('unauthorize');
Route::post('/login', [AuthController::class, 'authorizeOperator']);
Route::post('/send-notification/{id}', [NotificationController::class, 'sendNotification'])->name('sendNoti');
Route::post('/send-articlenoti/{id}', [ArticleController::class, 'sendArticleNotification']);
Route::post('/send-sponsorAd/{id}',[SponsorAdController::class, 'sendSponsorAdNotification']);

