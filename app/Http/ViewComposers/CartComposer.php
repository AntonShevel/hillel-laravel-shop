<?php

namespace LaravelShop\Http\ViewComposers;

use Illuminate\View\View;
use LaravelShop\Category;
use LaravelShop\Services\CartService;

class CartComposer
{
    private $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function compose(View $view)
    {
        $view->with('cart', $this->cartService->getCart());
    }
}
