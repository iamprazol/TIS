<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\UserPurpose::class, function (Faker $faker) {
    return [
        'information_id' => $faker->numberBetween(1,335),
        'purpose_id' => $faker->numberBetween(1,10),
    ];
});
