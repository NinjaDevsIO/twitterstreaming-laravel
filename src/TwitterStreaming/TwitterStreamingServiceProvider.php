<?php

/**
 * TwitterStreaming Laravel Service Provider
 *
 * Support of TwitterStreaming in Laravel
 *
 * @license MIT
 */
namespace TwitterStreaming\Laravel;

use Illuminate\Support\ServiceProvider;

class TwitterStreamingServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../config/config.php' => config_path('twitterstreaming.php')
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('twitterstreaming', function ($app) {
            return new TwitterStreaming($app['config']->get('twitterstreaming'));
        });
    }

    public function provides()
    {
        return [
            'twitterstreaming'
        ];
    }
}
