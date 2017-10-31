<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate(['product_id' => 'required|integer']);

        $productId = $request->get('product_id');
        $product = Product::where('id', $productId)->where('visible', true)->firstOrFail();
        if ($product) {
            $request->session()->increment("cart.{$productId}");
        }

        return redirect()->back();
    }

    public function showCart(Request $request)
    {
        $cart = $request->session()->get('cart');

        $products = Product::whereIn('id', array_keys($cart))
            ->where('visible', true)
            ->get();

        $finalPrice = $products->reduce(function($price, $product) use ($cart){
            return $price + $product->price * $cart[$product->id];
        });

        return view('cart', [
            'products' => $products,
            'cart' => $cart,
            'finalPrice' => $finalPrice
        ]);
    }

    public function updateCart(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:0',
            'product_id' => 'required|integer'
        ]);

        $productId = $request->get('product_id');
        $amount = (int) $request->get('amount');
        $key = "cart.{$productId}";

        if ($amount === 0) {
            $request->session()->forget($key);
        }  elseif ($request->session()->has($key)) {
            $request->session()->put($key, $amount);
        }

        return redirect()->back();
    }
}
