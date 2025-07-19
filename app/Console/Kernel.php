<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\StorePropertyJob;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
   protected function schedule(Schedule $schedule): void
{
    // Log output of StorePropertyJob and handle errors
    $schedule->job(new StorePropertyJob())
        ->everyMinute()
        ->onFailure(function () {
            \Log::error('StorePropertyJob failed.');
        })
        ->appendOutputTo(storage_path('logs/laravel.log'));

    // Log output of queue:work and handle errors
    $schedule->command('queue:work --stop-when-empty')
        ->everyMinute()
        ->onFailure(function () {
            \Log::error('Queue worker command failed.');
        })
        ->appendOutputTo(storage_path('logs/laravel.log'));
}
}
