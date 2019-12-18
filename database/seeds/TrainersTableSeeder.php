<?php

use Illuminate\Database\Seeder;
use App\Trainer;


class TrainersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Trainer::class,30)->create();

    }
}
