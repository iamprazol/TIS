<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckpointUser extends Model
{
    protected $fillable = [
        'id', 'user_id', 'checkpoint_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function checkpoint(){
        return $this->belongsTo('App\Checkpoint');
    }
}
