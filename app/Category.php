<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name', 'url', 'parent_id', 'visible'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}
