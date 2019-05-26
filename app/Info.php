<?php

namespace App;

use App\Http\Resources\InfoResource;
use Illuminate\Database\Eloquent\Model;
use App\Information;

class Info extends Model {

    // Fetch all users
    public static function getInformations(){
        $information = Information::all();
        $records = InfoResource::collection($information);
        return $records;
    }

}