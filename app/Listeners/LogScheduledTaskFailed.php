<?php

namespace App\Listeners;

use Illuminate\Console\Events\ScheduledTaskFailed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogScheduledTaskFailed
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
     * @param  \Illuminate\Console\Events\ScheduledTaskFailed  $event
     * @return void
     */
    public function handle(ScheduledTaskFailed $event)
    {
        Log::info("Scheduled task '" . $event->task->description . "' at " . date('H:i:s') . ' failed');
    }
}
