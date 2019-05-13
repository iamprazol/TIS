<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkpoint extends Model
{
    protected $fillable = [
        'id', 'checkpoint_name'
    ];
}
