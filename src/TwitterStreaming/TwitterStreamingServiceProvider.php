<?php

/**
 * TwitterStreaming Laravel Service Provider
 *
 * Support of TwitterStreaming in Laravel
 *
 * @license MIT
 */
namespace TwitterStreaming;

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

        $this->commands(Commands\TwitterStreamingPublic::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function provides()
    {
        return [
            Commands\TwitterStreamingPublic::class,
        ];
    }
}
