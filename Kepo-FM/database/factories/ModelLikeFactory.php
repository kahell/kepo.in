<?php

use Faker\Generator as Faker;
use App\Model\Customer;
use App\Model\Ask;

$factory->define(App\Model\Like::class, function (Faker $faker) {
    return [
      'customer_id' => function(){
        return Customer::all()->random();
      },
      'ask_id' => function(){
        return Ask::all()->random();
      },
    ];
});
