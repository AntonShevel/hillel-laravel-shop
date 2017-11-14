<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Product;
use Illuminate\Http\Request;
use LaravelShop\Services\CartService;

class CheckoutController extends Controller
{
    public function show(Request $request, CartService $cartService)
    {
        $cart       = $request->session()->get('cart', []);
        $products   = $cartService->getCart();
        $finalPrice = $cartService->getTotalPrice();

        return view('checkout', [
            'products' => $products,
            'cart' => $cart,
            'finalPrice' => $finalPrice
        ]);
    }
}
