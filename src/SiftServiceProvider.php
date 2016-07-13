<?php

namespace Suth\LaravelSift;

use SiftClient;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Suth\LaravelSift\Middleware\ManageSiftSession;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;

class SiftServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for Sift Science.
     *
     * @var array
     */
    protected $listen = [
        'Illuminate\Auth\Events\Login' => [
            'Suth\LaravelSift\Listeners\RecordLoginSuccess',
        ],
        'Illuminate\Auth\Events\Logout' => [
            'Suth\LaravelSift\Listeners\RecordLogout',
        ],
        'Illuminate\Auth\Events\Failed' => [
            'Suth\LaravelSift\Listeners\RecordLoginFailure',
        ],
    ];

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
        $this->mergeConfigFrom(__DIR__.'/config/sift.php', 'sift');

        $this->publishes([
            __DIR__.'/config/sift.php' => config_path('sift.php'),
        ]);

        $this->app->singleton(SiftScience::class, function ($app) {
            return new SiftScience(
                new SiftClient($app['config']['sift']['api_key'])
            );
        });
	}

    /**
     * Perform post-registration booting of services.
     *
     * @param  Illuminate\Contracts\Events\Dispatcher  $events
     * @param  \Illuminate\Routing\Router  $router
     * @return void
     */
    public function boot(DispatcherContract $events, Router $router)
    {
        $router->pushMiddlewareToGroup('web', ManageSiftSession::class);

        foreach ($this->listen as $event) {
            foreach ($event as $listener) {
                $events->listen($event, $listener);
            }
        }

        $this->loadViewsFrom(__DIR__.'/Views', 'sift');
    }
}
