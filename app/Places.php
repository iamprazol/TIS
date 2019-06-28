<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    protected  $fillable = [
        'id', 'districts_id', 'place_name', 'picture', 'description'
    ];

    public function districts(){
        return $this->belongsTo('App\Districts');
    }
}
