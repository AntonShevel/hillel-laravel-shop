<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'filename', 'visible'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
