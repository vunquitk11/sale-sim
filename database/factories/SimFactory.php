<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sim;
use Faker\Generator as Faker;

$factory->define(Sim::class, function (Faker $faker) {
    return [
        'phone' => '0'.rand(111111111,999999999),
        'price' => rand(1,99)*10000,
        'description' => $faker->sentence(),
        'category_id' => rand(1, 10),
        'brand_id' => rand(1, 5),
        'visible' => 1,
    ];
});
