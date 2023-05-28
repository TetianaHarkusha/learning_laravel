<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Jobs\UpdateUsersTable;

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
        $schedule->job(new UpdateUsersTable, 'schedule')
            ->name('update:users_table')
            ->everyFiveMinutes()
            ->onSuccess(function () {
                Log::info("The task has been added to 'schedule' queue.");
            })
            ->onFailure(function () {
                Log::info("Failed to add the task to the queue.");
            });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
