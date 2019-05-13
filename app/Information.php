<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id', 'user_id', 'purpose_id', 'tourist_name', 'country_name', 'age', 'visa_period'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function purpose(){
        return $this->belongsTo('App\Purpose');
    }
}
