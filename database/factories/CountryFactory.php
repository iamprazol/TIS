<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Countries;
use Faker\Generator as Faker;

$factory->define(Countries::class, function (Faker $faker) {
    return [
        'country_name' => $faker->name,
        'TwoCharCountryCode' => 'Au',
        'ThreeCharCountryCode' => 'Aus',
        'count' => $faker->numberBetween(1,50)
    ];
});
