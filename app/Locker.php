<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locker extends Model
{

    public function trainer()
    {
      return $this->belongsTo('App\Trainer');
    }



}
