<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainee;
use Faker\Generator as Faker;

$factory->define(Trainee::class, function (Faker $faker) {

    return [
        'name' => $faker->name,
        'title' => $faker->title,
        'type' => $faker->randomElement(['male','female']),
        'email' => $faker->unique()->safeEmail,
        'number' =>$faker->numberBetween(20,200),
        'trainer_id'=>App\Trainer::inRandomOrder()->first()->id,
        //function () {
          //return factory(App\Trainer::class)->create()->id;
       //}



    ];
});
