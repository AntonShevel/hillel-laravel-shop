<?php

namespace LaravelShop\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelShop\Services\CartService;
use LaravelShop\Services\CartServiceInterface;

class CartServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CartServiceInterface::class, function ($app) {
            return new CartService($app->make('session'));
        });
    }
}
