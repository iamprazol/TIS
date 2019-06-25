<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\ExitInfo;
use Faker\Generator as Faker;

$factory->define(ExitInfo::class, function (Faker $faker) {
    return [
        'countries_id' => $faker->numberBetween(1,20),
        'checkpoint_id' => $faker->numberBetween(1,3),
        'tourist_name' => $faker->name,
        'tourist_type' =>  $faker->numberBetween(0,1),
        'passport_number' =>  $faker->numberBetween(100000000, 9999999999),
        'gender' =>  $faker->randomElement(['Male', 'Female', 'Others']),
        'reviews' =>  $faker->paragraph(mt_rand(2,6), True),
        'nepali_date' => "2076-02-19"
    ];
});
