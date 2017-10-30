<?php

use Faker\Generator as Faker;
use LaravelShop\Image;

$factory->define(Image::class, function () {
    return [
        'filename' =>"1.jpg",
        'visible' => true
    ];
});
