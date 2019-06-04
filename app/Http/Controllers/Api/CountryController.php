<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Countries;
use App\Http\Resources\CountryResource;

class CountryController extends Controller
{
    public function index(){
        $country = Countries::orderBy('country_name', 'asc')->get();
        $data = CountryResource::collection($country);
        return $this->responser($country, $data, "All Countries Listed Successfully");
    }
}
