<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
    public function locker()
    {
      return $this->hasOne('App\Locker');
    }

    public function Trainees()
    {
      return $this->hasMany('App\Trainee');
    }
    public function comments()
    {
      return $this->hasMany('App\Comment');
    }

    public function lessons()
    {

      return $this->hasMany(Lesson::class);

    }
    

    




}
