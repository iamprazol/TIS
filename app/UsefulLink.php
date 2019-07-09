<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsefulLink extends Model
{
    protected $fillable = [
        'link', 'display_name'
    ];
}
