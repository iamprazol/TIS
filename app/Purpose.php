<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = [
        'id', 'purpose', 'editable'
    ];

    public function userpurpose(){
        return $this->hasMany('App\UserPurpose');
    }
}
