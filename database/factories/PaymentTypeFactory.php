<?php

use Faker\Generator as Faker;
use LaravelShop\PaymentType;

$factory->define(PaymentType::class, function (Faker $faker) {
    return [
        'name' => $faker->firstNameFemale,
        'visible' => true
    ];
});
