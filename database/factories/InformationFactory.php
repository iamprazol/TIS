<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Information;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'checkpoint_id' => $faker->numberBetween(1,3),
        'countries_id' => $faker->numberBetween(1,20),
        'tourist_name' => $faker->name,
        'tourist_type' =>  $faker->numberBetween(0,1),
        'passport_number' =>  $faker->numberBetween(100000000, 9999999999),
        'gender' =>  $faker->randomElement(['Male', 'Female', 'Others']),
        'nepali_date' => "2076-02-19"
    ];
});
