<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('yogazen:subscription-reminders')
        //          ->dailyAt('8:00')
        //          ->appendOutputTo(storage_path('logs/subscription-reminders.log'));
        
        // $schedule->command('yogazen:archive-inactive-accounts')
        //          ->daily()
        //          ->appendOutputTo(storage_path('logs/account-archiving.log'));    
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
