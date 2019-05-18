<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    protected $fillable = [
        'id', 'checkpoint_id', 'purpose_id', 'tourist_name', 'country_name', 'age', 'visa_period', 'editable'
    ];

    public function checkpoint(){
        return $this->belongsTo('App\Checkpoint');
    }

    public function purpose(){
        return $this->belongsTo('App\Purpose');
    }
}
