<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Events\QueryExecuted;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('name', 'John');
        View::share('surname', 'Smit');

        // Listening For Query Events
        DB::listen(function (QueryExecuted $query) {
            Log::info("
            Sql: $query->sql
            Time: $query->time
            ------------------");
        });

        Paginator::useBootstrap();
    }
}
