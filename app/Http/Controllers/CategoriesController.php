<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

class CategoriesController extends Controller
{
    /**
     * Показать список товаров в категории
     */
    public function show($url)
    {
//        \DB::enableQueryLog();
        $category = Category::where('url', '=', $url)->first();
        $products = $category->products()->paginate(10);

//        dump($products);
//        dump(\DB::getQueryLog());

        return view('category', [
            'category' => $category,
            'products' => $products
        ]);
    }
}
