<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Locker;
use Faker\Generator as Faker;

$factory->define(Locker::class, function (Faker $faker) {
  static $idcounter = 1;

    return [

        'trainer_id'=>$idcounter++,
        'type' => $faker->randomElement(['Metal','Steel','Wood']),
        'number' =>$faker->numberBetween(1,200),





    ];
});
