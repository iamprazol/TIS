<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Information;
use Faker\Generator as Faker;

$factory->define(Information::class, function (Faker $faker) {
    return [
        'checkpoint_id' => $faker->numberBetween(1,3),
        'country_id' => $faker->numberBetween(1,20),
        'tourist_name' => $faker->sentence(1),
        'tourist_type' =>  $faker->numberBetween(0,1),
        'gender' =>  $faker->randomElement(['Male', 'Female', 'Others']),
        'nepali_date' => "2076-02-19"
    ];
});
