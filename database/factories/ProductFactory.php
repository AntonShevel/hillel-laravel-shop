<?php

use Faker\Generator as Faker;
use LaravelShop\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'visible' => true,
        'price' => $faker->randomNumber(3),
        'url' => $faker->word
    ];
});
