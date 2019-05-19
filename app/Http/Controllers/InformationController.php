<?php

namespace App\Http\Controllers;

use App\Checkpoint;
use App\Purpose;
use Carbon\Carbon;
use http\Client\Curl\User;
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
                $i->editable = 0;
                $i->save();
            }
            $info[] = $i;
        }

        return view('information.index')->with('tourists', $informations);

        /*$data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information Listed Successfully');*/
    }

    public function checkpointInformation($id){
        $information = Information::where('checkpoint_id', $id)->paginate(15);
        $data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information of a specific checkpoint Listed Successfully');
    }

    public function create(){
        $user = Auth::user();
        if($user->is_admin == 1) {
            $checkpoint = Checkpoint::all();
            $purpose = Purpose::all();
            return view('information.create')->with('purposes', $purpose)->with('checkpoints', $checkpoint);
        } else {
            $purpose = Purpose::all();
            return view('information.create')->with('purposes', $purpose);
        }
    }

    public function store(Request $r){

        $this->Validate($r, [
            'tourist_name' => 'required|string|max:255|min:2',
            'country_name' => 'required|string|max:255|min:2'
            ]);

        $information = Information::create([
            'checkpoint_id' => $r->checkpoint_id,
            'purpose_id' => $r->purpose_id,
            'tourist_name' => $r->tourist_name,
            'country_name' => $r->country_name,
            'age' => $r->age,
            'visa_period' => $r->visa_period
        ]);
        return redirect()->route('information.index')->with('tourists', $information)->withStatus(__('Information successfully added.'));

        /*if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
        $data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist added successfully');*/
    }

    public function editInformation($id){
        $tourist = Information::find($id);
        $purpose = Purpose::all();
        return view('information.edit')->with('purposes', $purpose)->with('tourist', $tourist);
    }

    public function updateInformation(Request $request, $id)
    {
        $this->Validate($request, [
            'tourist_name' => 'required|string|max:255|min:2',
            'country_name' => 'required|string|max:255|min:2'
        ]);

        $information = Information::find($id);
        $information->purpose_id = $request->purpose_id;
        $information->tourist_name = $request->tourist_name;
        $information->country_name = $request->country_name;
        $information->age = $request->age;
        $information->visa_period = $request->visa_period;
        $information->save();

        return redirect()->route('information.index')->with('tourists', $information)->withStatus(__('Information updated successfully'));

        /*$data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist updated successfully');
   } else {
       return response()->json(['message' => 'Information cannot be edited', 'status' => 403], '403');
   */
    }
}
