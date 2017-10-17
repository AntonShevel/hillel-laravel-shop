<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

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


    public function searchResult(Request $request)
    {
       
        $search = Product::where('name', 'LIKE', '%'.  $request->input('search') .'%')->paginate(5);

        return view('search', ['products' => $search]);
    }
}
