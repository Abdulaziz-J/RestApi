<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {

       $LS1 = new Lesson;
       $LS1->name = "Swimming Sport";
       $LS1->description = "Adults $ children";
       $LS1->day = "Monday";
       $LS1->date = "20/11/2019";
       $LS1->save();
       $LS1->trainees()->attach(1);

       $LS2 = new Lesson;
       $LS2->name = "Boxing Sport";
       $LS2->description = "Adults";
       $LS2->day = "Monday";
       $LS2->date = "20/11/2019";
       $LS2->save();
       $LS2->trainees()->attach(2);


       $LS3 = new Lesson;
       $LS3->name = "Karate Sport";
       $LS3->description = "Adults & children";
       $LS3->day = "Monday";
       $LS3->date = "20/11/2019";
       $LS3->save();
       $LS3->trainees()->attach(3);

       $LS4 = new Lesson;
       $LS4->name = "Football Sport";
       $LS4->description = "Adults";
       $LS4->day = "Tuesday";
       $LS4->date = "20/11/2019";
       $LS4->save();
       $LS4->trainees()->attach(4);

       $LS5 = new Lesson;
       $LS5->name = "Yoga Sport";
       $LS5->description = "Adults";
       $LS5->day = "Thursday";
       $LS5->date = "20/11/2019";
       $LS5->save();
       $LS5->trainees()->attach(5);

    }
}
