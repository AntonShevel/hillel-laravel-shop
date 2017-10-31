<?php

namespace LaravelShop\Http\ViewComposers;

use Illuminate\View\View;
use LaravelShop\Category;

class CategoriesComposer
{
    public function compose(View $view)
    {
        $categories = Category::all();

        $view->with('categories', $categories);
    }
}
