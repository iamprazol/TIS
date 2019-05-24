<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id',
        'checkpoint_id',
        'country_id',
        'tourist_name',
        'tourist_type',
        'country_name',
        'duration',
        'age',
        'gender',
        'visa_period',
        'passport_number',
        'editable'
    ];

    public function checkpoint(){
        return $this->belongsTo('App\Checkpoint');
    }

    public function userpurpose(){
        return $this->hasMany('App\UserPurpose');
    }

    public function country(){
        return $this->belongsTo('App\Countries');
    }
}
