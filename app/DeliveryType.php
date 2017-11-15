<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class DeliveryType extends Model
{
    protected $fillable = ['name', 'visible'];
}
