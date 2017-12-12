<?php

namespace LaravelShop\Providers;

use Vinkla\Instagram\Instagram;
use Illuminate\Support\ServiceProvider;

class InstagramServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Instagram::class, function ($instagram) {
            return new Instagram(config('instagram.token'));
        });
    }
}
