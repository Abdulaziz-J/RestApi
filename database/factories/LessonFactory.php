<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lesson;
use Faker\Generator as Faker;

$factory->define(Lesson::class, function (Faker $faker) {
    return [

        'name'=> $faker->randomElement(['Swimming Sport','Fottball Sport','Boxing Sport','Yoga Sport']),
        'description'=> $faker->paragraph,
        'day'=> $faker->randomElement(['Sunday','Mandy','Thursday','Friday']),
        'date' =>  $faker->date,
        'trainer_id'=>App\Trainer::inRandomOrder()->first()->id,



       


    ];
});
