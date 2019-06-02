<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'id', 'user_id', 'information_id', 'is_approved'
    ];

    public function information(){
        return $this->belongsTo('App\Information');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
