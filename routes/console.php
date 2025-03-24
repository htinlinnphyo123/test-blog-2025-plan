<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;
use App\Console\Commands\SendPerDayNotification;
use App\Console\Commands\SendPerMonthNotification;
use App\Console\Commands\SendPerWeekNotification;
use App\Console\Commands\SendPerYearNotification;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

// Artisan::command('inspire', function () {
//     $this->comment(Inspiring::quote());
// })->purpose('Display an inspiring quote');

Schedule::command(SendPerDayNotification::class)->hourly();
Schedule::command(SendPerMonthNotification::class)->daily();
Schedule::command(SendPerWeekNotification::class)->daily();
Schedule::command(SendPerYearNotification::class)->monthly();