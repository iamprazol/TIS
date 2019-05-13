<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'id', 'purpose'
    ];

    public function information(){
        return $this->hasMany('App\Information');
    }
}
