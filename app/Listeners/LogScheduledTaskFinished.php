<?php

namespace App\Listeners;

use Illuminate\Console\Events\ScheduledTaskFinished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogScheduledTaskFinished
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Console\Events\ScheduledTaskFinished  $event
     * @return void
     */
    public function handle(ScheduledTaskFinished $event)
    {
        Log::info("Scheduled task '" . $event->task->description . "' finished. 
        -----------------------------------------");
    }
}
