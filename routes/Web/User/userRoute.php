<?php

use BasicDashboard\Web\Users\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('users', UserController::class);