<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['client_email', 'client_phone', 'client_name',
            'total_price', 'comment', 'delivery_address', 'delivery_type_id', 'payment_type_id'
        ];

    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function deliveryType()
    {
        return $this->hasOne(DeliveryType::class);
    }

    public function paymentType()
    {
        return $this->hasOne(PaymentType::class);
    }
}
