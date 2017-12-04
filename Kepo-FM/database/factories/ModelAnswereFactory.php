<?php

use Faker\Generator as Faker;
use App\Model\Ask;
$factory->define(App\Model\Answere::class, function (Faker $faker) {
    $ask = Ask::all();
    return [
      'ask_id' => $faker->unique()->randomElement(App\Model\Ask::pluck('id', 'id')->toArray()),
      'slug' => $faker->slug(),
      'answere' => $faker->word,
      'status_answere' => $faker->randomElement(['on', 'off']),
    ];
});
