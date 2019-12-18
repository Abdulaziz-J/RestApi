<?php

use Illuminate\Database\Seeder;
use App\Trainee;

class TraineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $p1 = new Trainee;
        $p1->name = "sean";
        $p1->title = "Dr";
        $p1->type = "male";
        $p1->email = "aaadd@swasea.com";
        $p1->number = 1111;
        $p1-> trainer_id = 1;
        $p1->save();

        factory(App\Trainee::class,70)->create();   //random Trainee
    }
}
