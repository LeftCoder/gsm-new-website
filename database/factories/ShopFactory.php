<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shop;
use Faker\Generator as Faker;

$factory->define(Shop::class, function (Faker $faker) {
    return [
        'shop_name' => $faker->company,
        'city_name' => $faker->city,
        'postal_code' => $faker->regexify('[0-9]{2}\-[0-9]{3}'),
        'street' => $faker->streetName,
        'lat' => $faker->latitude(49, 55),
        'lng' => $faker->longitude(14, 24),
        'email' => $faker->email,
        'telephone' => $faker->regexify('[0-9]{3}\-[0-9]{3}\-[0-9]{3}'),
        'published' => $faker->boolean(50)
    ];
});