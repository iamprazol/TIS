<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Purpose::class, function (Faker $faker) {
    return [
        'purpose' => $faker->sentence(1)
        ];
});
