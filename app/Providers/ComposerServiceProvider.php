<?php

namespace LaravelShop\Providers;

use LaravelShop\Http\ViewComposers\CartComposer;
use LaravelShop\Http\ViewComposers\CategoriesComposer;
use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('products', CategoriesComposer::class);
        View::composer('layouts/app', CartComposer::class);
    }
}
