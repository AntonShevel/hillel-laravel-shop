<?php

namespace LaravelShop;

use Illuminate\Database\Eloquent\Model;

class InstagramPhotos extends Model
{
    protected $table = 'instagram_images';
    protected $fillable = [
        'instagram_id','url',
    ];//
    public function Photos()
    {
        return $this->belongsToMany(InstagramPhotos::class);
    }
}
