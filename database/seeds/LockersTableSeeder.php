<?php

use Illuminate\Database\Seeder;
use App\Locker;


class LockersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        factory(App\Locker::class,30)->create();


    }
}
