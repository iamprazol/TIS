<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    protected $fillable = [
        'id', 'checkpoint_name'
    ];

    public function checkpointuser(){
        return $this->hasOne('App\CheckpointUser');
    }

    public function information(){
        return $this->hasMany('App\Information');
    }

    public function exitinfo(){
        return $this->hasMany('App\ExitInfo');
    }
}
