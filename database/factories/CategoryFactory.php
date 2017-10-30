<?php

use Faker\Generator as Faker;
use LaravelShop\Category;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
        'visible' => true,
        'url' => $faker->word,
        'parent_id' => null
    ];
});
