<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $fillable = ['product_id', 'price', 'amount', 'name', 'order_id'];
}
