<?php

use Faker\Generator as Faker;
use App\Model\Customer;
$factory->define(App\Model\Ask::class, function (Faker $faker) {
    return [
      'customer_id' => function(){
        return Customer::all()->random();
      },
      'slug' => $faker->slug(),
      'question' => $faker->word,
      'status_quetioner' => $faker->randomElement(['on', 'off']),
    ];
});
