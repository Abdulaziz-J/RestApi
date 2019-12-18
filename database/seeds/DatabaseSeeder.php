<?php

use Illuminate\Database\Seeder;
use App\Trainer;
use App\Trainee;
use App\Locker;
use App\Lesson;
use App\Comment;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TrainersTableSeeder::class);
        $this->call(TraineesTableSeeder::class);
        $this->call(LockersTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(CommentsTableSeeder::class);


    }
}
