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
}
