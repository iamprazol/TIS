<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $fillable = [
        'id',
        'address',
        'email',
        'phone',
        'fax'
    ];
}
