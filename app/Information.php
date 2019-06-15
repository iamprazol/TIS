<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id',
        'checkpoint_id',
        'countries_id',
        'tourist_name',
        'tourist_type',
        'duration',
        'age',
        'gender',
        'visa_period',
        'passport_number',
        'editable',
        'nepali_date',
        'provisional_card',
        'status'
    ];

    public function checkpoint(){
        return $this->belongsTo('App\Checkpoint');
    }

    public function userpurpose(){
        return $this->hasMany('App\UserPurpose');
    }

    public function request(){
        return $this->hasMany('App\Request');
    }

    public function countries(){
        return $this->belongsTo('App\Countries');
    }
}
