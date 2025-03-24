<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangController;

Route::get('/change', [LangController::class, 'change'])->name('changeLang');