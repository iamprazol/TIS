<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InformationResource as InformationResource;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function index(){
        $informations = Information::orderBy('checkpoint_id', 'asc')->paginate(15);
        foreach ($informations as $i){
            $now = Carbon::now();
            $aday = Carbon::parse($i->created_at)->addDay();
            if($now >= $aday) {
                $i->editable == 0;
                $i->save();
                $info[] = $i;
            } else {
                $info[] = $i;
            }
        }
        $information = collect($info);
        $data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information Listed Successfully');
    }

    public function checkpointInformation($id){
        $information = Information::where('checkpoint_id', $id)->paginate(15);
        $data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information of a specific checkpoint Listed Successfully');

    }
    public function addInformation(Request $r){

        $validator = Validator::make($r->all(),[
            'tourist_name' => 'required|string|max:255|min:2',
            'country_name' => 'required|string|max:255|min:2'
            ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
        $information = Information::create([
            'checkpoint_id' => Auth::user()->checkpointuser->checkpoint_id,
            'purpose_id' => $r->purpose_id,
            'tourist_name' => $r->tourist_name,
            'country_name' => $r->country_name,
            'age' => $r->age,
            'visa_period' => $r->visa_period
        ]);

        $data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist added successfully');
    }

    public function editInformation(Request $request, $id){
        $information = Information::find($id);
        if($information->editable == 1){
            $information->update($request->all());
            $data = new InformationResource($information);
            return $this->responser($information, $data, 'Information of tourist updated successfully');
        } else {
            return response()->json(['message' => 'Information cannot be edited', 'status' => 403], '403');
        }
    }
}
