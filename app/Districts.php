<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $fillable = [
        'id', 'district_name', 'picture', 'description'
    ];

    public function places(){
        return $this->hasMany('App\Places');
    }
}
