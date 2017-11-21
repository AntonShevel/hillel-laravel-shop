<?php

namespace LaravelShop\Http\ViewComposers;

use Illuminate\View\View;
use LaravelShop\Services\CartServiceInterface;

class CartComposer
{
    private $cartService;

    public function __construct(CartServiceInterface $cartService)
    {
        $this->cartService = $cartService;
    }

    public function compose(View $view)
    {
        $view->with('cart', $this->cartService->getCart());
    }
}
