<?php

namespace LaravelShop\Http\Controllers;

use LaravelShop\Product;
use Illuminate\Http\Request;
use LaravelShop\Services\CartServiceInterface;

class CartController extends Controller
{
    public function addToCart(Request $request, CartServiceInterface $cartService)
    {
        $request->validate(['product_id' => 'required|integer']);

        $productId = (int) $request->get('product_id');
        Product::where('id', $productId)->where('visible', true)->firstOrFail();

        $cartService->addProduct($productId);

        return redirect()->back();
    }

    public function showCart(CartServiceInterface $cartService)
    {
        $products = $cartService->getCart();
        $finalPrice = $cartService->getTotalPrice();

        return view('cart', [
            'products' => $products,
            'cart' => $cartService->getAmounts(),
            'finalPrice' => $finalPrice
        ]);
    }

    public function updateCart(Request $request, CartServiceInterface $cartService)
    {
        $request->validate([
            'amount' => 'required|integer|min:0',
            'product_id' => 'required|integer'
        ]);


        $productId = (int) $request->get('product_id');
        $amount = (int) $request->get('amount');

        $cartService->updateAmount($productId, $amount);

        return redirect()->back();
    }
}
