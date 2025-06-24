<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Run the command to clean empty comments every minute
        $schedule->command('comments:clean')->everyMinute();

        // Note: For testing purposes, you can use:
        // $schedule->command('comments:clean')->everyMinute()->withoutOverlapping();
        // Or during development:
        // $schedule->command('comments:clean')->everyThirtySeconds();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        // Load all commands from the Commands directory
        $this->load(__DIR__ . '/Commands');

        // Include console routes file if exists
        require base_path('routes/console.php');
    }
}