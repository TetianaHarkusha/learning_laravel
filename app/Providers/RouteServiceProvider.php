<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        //global patterns for parameters
        Route::patterns(['date' => '[1-2]{1}[0-9]{3}-([0]?[1-9]|[1][0-2])-([0]?[1-9]|[1-2][0-9]|[3][0-1])',
            'year' => '[1-2]{1}[0-9]{3}',
            'month' => '[0]?[1-9]|[1][0-2]',
            'day' => '[0]?[1-9]|[1-2][0-9]|[3][0-1]',
            'id' => '[0-9]+']);
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        RateLimiter::for('updating-pages', function (Request $request) {
            return $request->user()
                ? Limit::perMinute(25)->by($request->user()->id)
                : Limit::perMinute(5)->by($request->id);
        });
    }
}
