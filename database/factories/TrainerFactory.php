<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Trainer;
use Faker\Generator as Faker;

$factory->define(Trainer::class, function (Faker $faker) {

    return [

        'name' => $faker->name,
       // 'type' =>$faker->type,
        //'No_Of Sports' => $faker->No_OfSports,
        


    ];
});
