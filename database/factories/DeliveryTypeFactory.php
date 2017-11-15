<?php

use Faker\Generator as Faker;
use LaravelShop\DeliveryType;

$factory->define(DeliveryType::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameMale,
        'visible' => true
    ];
});
