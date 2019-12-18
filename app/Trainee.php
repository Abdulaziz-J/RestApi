<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    // Table Name
    protected $table = 'trainees';
    // Primary Key
    public $primarykey = 'id';
    // Timestamps
    public $timestamps = true;

    public function trainer()
    {
      return $this->belongsTo('App\Trainer','trainer_id'); //foreign key
    }

    public function lessons()
    {
      return $this->belongsToMany('App\Lesson','lesson__trainee');
    }

    public function comments()
    {
      return $this->hasMany(Comment::class);
    }
    

}
