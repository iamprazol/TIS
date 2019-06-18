<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExitInfo extends Model
{
    protected $fillable = [
        'id',
        'tourist_name',
        'passport_number',
        'countries_id',
        'gender',
        'reviews',
        'tourist_type',
        'nepali_date',
        'checkpoint_id'
    ];

    public function countries(){
        return $this->belongsTo('App\Countries');
    }

    public function checkpoint(){
        return $this->belongsTo('App\Checkpoint');
    }
}
