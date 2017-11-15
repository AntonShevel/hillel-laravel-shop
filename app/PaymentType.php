<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    protected $fillable = ['name', 'visible'];
}
