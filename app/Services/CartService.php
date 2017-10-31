<?php

namespace LaravelShop\Services;

use LaravelShop\Product;

class CartService
{
    private $session;
    private $products;
    private $totalPrice;

    public function __construct($session)
    {
        $this->session = $session;
    }

    public function getCart()
    {
        if ($this->products){
            return $this->products;
        }
        return $this->products = $this->getProducts();
    }

    public function getTotalPrice()
    {
        if ($this->totalPrice){
            return $this->totalPrice;
        }
        $cart = $this->getSessionCart();

        return $this->totalPrice = $this
            ->getProducts()
            ->reduce(function($price, $product) use ($cart) {
                return $price + $product->price * $cart[$product->id];
            });
    }

    private function getProducts()
    {
        $cart = $this->getSessionCart();
        return Product::whereIn('id', array_keys($cart))
            ->where('visible', true)
            ->get();
    }

    private function getSessionCart()
    {
        return $this->session->get('cart', []);
    }
}
