<?php

namespace App\Listeners;

use Illuminate\Console\Events\ScheduledTaskSkipped;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class LogScheduledTaskSkipped
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
     * @param  \Illuminate\Console\Events\ScheduledTaskSkipped  $event
     * @return void
     */
    public function handle(ScheduledTaskSkipped $event)
    {
        Log::info("Scheduled task '" . $event->task->description . ' skipped');
    }
}
