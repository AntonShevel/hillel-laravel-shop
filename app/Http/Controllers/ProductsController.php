<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;

class ProductsController extends Controller
{
    /**
     * Показать список товаров
     */
    public function index()
    {
        $products = Product::paginate(10);
        $categories = Category::all();

        return view('products', [
            'products' => $products,
            'categories' => $categories
        ]);
    }

    /**
     * Показать детали товара
     */
    public function show($url)
    {
        $product = Product::where('url', '=', $url)->first();

        return view('product', ['product' => $product]);
    }
}
