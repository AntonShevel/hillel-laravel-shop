<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Image;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'visible', 'price', 'url'
    ];

    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
