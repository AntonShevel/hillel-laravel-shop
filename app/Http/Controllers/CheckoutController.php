<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Services\CartServiceInterface;

class CheckoutController extends Controller
{
    public function show(CartServiceInterface $cartService)
    {
        $cart       = $cartService->getAmounts();
        $products   = $cartService->getCart();
        $finalPrice = $cartService->getTotalPrice();

        return view('checkout', [
            'products' => $products,
            'cart' => $cart,
            'finalPrice' => $finalPrice
        ]);
    }
}
