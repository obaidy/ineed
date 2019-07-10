<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availability';

    public function user(){
        return $this->belongsTo('App\User');
    }
}
