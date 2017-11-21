<?php

namespace LaravelShop\Services;

interface CartServiceInterface
{
    public function addProduct(int $productId);

    public function updateAmount(int $productId, int $amount);

    public function getCart();

    public function getTotalPrice();

    public function getAmounts();
}
