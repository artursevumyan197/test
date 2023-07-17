<?php

namespace App\Console;

use App\Console\Commands\CleanUpTableEntryCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */

    protected $commands = [
        CleanUpTableEntryCommand::class,
    ];

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('clean:table-entry')
            ->dailyAt('12:00');
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
