<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Customer::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    $genderInitial = ($gender == 'male') ? 'M' : 'F';
    return [
      'fullname' => $faker->name,
      'email' => $faker->unique()->safeEmail,
      'avatar' => 'http://www.designskilz.com/random-users/images/image'.$genderInitial.rand(1, 50).'.jpg',
      'password' =>bcrypt('1234'),
      'remember_token' => str_random(10),
    ];
});
