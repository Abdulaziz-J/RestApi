<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['user_id', 'lesson_id', 'content', 'iamge_name'];

  

    public function lesson()
    {

      return $this->belongsTo(Lesson::class);

    }

    public function user(){
      return $this->belongsTo(User::class);
    }
    
    public function trainee()
    {

      return $this->belongsTo(Trainee::class);

    }public function trainer()
    {

      return $this->belongsTo(Trainer::class);

    }
}
