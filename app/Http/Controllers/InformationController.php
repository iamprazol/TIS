<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InformationResource as InformationResource;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function addInformation(Request $r){

        $validator = Validator::make($r->all(),[
            'tourist_name' => 'required|string|max:255|min:2',
            'country_name' => 'required|string|max:255|min:2'
            ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
        $information = Information::create([
            'user_id' => Auth::id(),
            'purpose_id' => $r->purpose_id,
            'tourist_name' => $r->tourist_name,
            'country_name' => $r->country_name,
            'age' => $r->age,
            'visa_period' => $r->visa_period
        ]);

        $data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist added successfully');
    }
}
