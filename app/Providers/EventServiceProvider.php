<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\Registered;
use App\Listeners\SendEmailRegistrationNotification;
use App\Listeners\SendEmailVerificationNotification;
use Illuminate\Console\Events\ScheduledTaskStarting;
use Illuminate\Console\Events\ScheduledTaskFinished;
use Illuminate\Console\Events\ScheduledTaskSkipped;
use Illuminate\Console\Events\ScheduledTaskFailed;
use App\Listeners\LogScheduledTaskStarting;
use App\Listeners\LogScheduledTaskFinished;
use App\Listeners\LogScheduledTaskSkipped;
use App\Listeners\LogScheduledTaskFailed;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailRegistrationNotification::class,
            SendEmailVerificationNotification::class,  
        ],

        ScheduledTaskStarting::class => [
            LogScheduledTaskStarting::class,
        ],
     
        ScheduledTaskFinished::class => [
            LogScheduledTaskFinished::class,
        ],
                  
        ScheduledTaskSkipped::class => [
            LogScheduledTaskSkipped::class,
        ],
     
        ScheduledTaskFailed::class => [
            LogScheduledTaskFailed ::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
