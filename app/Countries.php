<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    protected $fillable = [
        'id',
        'country_name',
        'TwoCharCountryCode',
        'ThreeCharCountryCode'
    ];

    public function information(){
        return $this->hasMany('App\Information');
    }
}
