<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    public function trainees()
    {

      return $this->belongsToMany('App\Trainee','lesson__trainee');

    }

    public function comments()
    {

      return $this->hasMany(Comment::class);

    }

    public function trainer()
    {
      return $this->belongsTo('App\Trainer','trainer_id'); //foreign key
    }
}
