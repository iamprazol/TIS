<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPurpose extends Model
{
    protected $fillable = [
        'id',
        'information_id',
        'purpose_id'
    ];

    public function information(){
        return $this->belongsTo('App\Information');
    }

    public function purpose(){
        return $this->belongsTo('App\Purpose');
    }
}
