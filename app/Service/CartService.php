<?php

namespace LaravelShop\Services;
use LaravelShop\Product;


class CartService
{
	private $session;
	private $products;
	private $totalPrice;

	public function __construct(Session $session)
	{
		$this->session = $session;
	}

	public function getCart()
	{
		if($this->products){
			return $this->products;
		}

		return $this->getProducts();
	}
	public function getTotalPrice()
	{
		return $this->totalPrice = $this
			->getProducts()
			->reduce (function($price, $product) use ($cart){
            return $price + $product->price * $cart[$product->id];
        });
	}

	public function getProducts()
	{	
		if($this->totalPrice) {
			return $this->totalPrice;
		}

		$cart = $this->getSessionCart();

		return Product::whereIn('id', array_keys($cart))
            ->where('visible', true)
            ->get();
	}

	public function getSessionCart()
	{
		return $this->session()->get('cart', []);
	}
}