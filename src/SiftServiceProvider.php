<?php

namespace Suth\LaravelSift;

use SiftClient;
use Illuminate\Support\ServiceProvider;

class SiftServiceProvider extends ServiceProvider
{
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

        $this->app->singleton('siftscience', function ($app) {
            return new SiftClient(config('sift.api_key'));
        });
	}
}
