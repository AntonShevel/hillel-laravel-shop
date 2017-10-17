<?php

use Faker\Generator as Faker;
use App\Image;

$factory->define(Image::class, function () {
    return [
        'filename' =>"1.jpg",
        'visible' => true
    ];
});
