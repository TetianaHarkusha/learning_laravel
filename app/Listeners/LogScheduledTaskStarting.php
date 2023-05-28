<?php

namespace App\Listeners;

use Illuminate\Console\Events\ScheduledTaskStarting;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogScheduledTaskStarting
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
     * @param  \Illuminate\Console\Events\ScheduledTaskStarting  $event
     * @return void
     */
    public function handle(ScheduledTaskStarting $event)
    {
        Log::info("Scheduled task '" . $event->task->description . "' starting.");
    }
}
