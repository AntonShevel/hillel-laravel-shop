<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Product;
use LaravelShop\Category;

class CategoriesController extends Controller
{
    /**
     * Показать список товаров в категории
     */
    public function show($url)
    {
        $category = Category::where('url', $url)->firstOrFail();
        $products = $category->products()->paginate(10);

        return view('category', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
