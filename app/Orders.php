<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = 
    [
        'user_name', 
        'user_phone', 
        'product_id', 
        'product_amount', 
        'department', 
        'city', 
        'delivery', 
        'pay', 
        'final_price'
    ];

    public function orders()
    {
        return $this->belongsToMany(Orders::class);
    }
}
