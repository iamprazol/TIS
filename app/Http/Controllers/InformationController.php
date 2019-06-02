<?php

namespace App\Http\Controllers;

use App\Checkpoint;
use App\Countries;
use App\Exports\InformationExport;
use App\Http\Resources\InfoResource;
use App\Info;
use App\Purpose;
use App\UserPurpose;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InformationResource as InformationResource;
use App\DateConverter;
use Illuminate\Validation\Rules\In;
use Maatwebsite\Excel\Facades\Excel;

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
        $purposes = Purpose::all();

        return view('information.index')->with('tourists', $informations)->with('purposes', $purposes);

        /*$data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information Listed Successfully');*/
    }

    ///////////////////////////////////

    public function checkpointInformation($id){
        $information = Information::where('checkpoint_id', $id)->paginate(15);
        $data = InformationResource::collection($information);
        return $this->responser($information, $data, 'All Tourist Information of a specific checkpoint Listed Successfully');
    }

    ///////////////////////////////////

    public function create(){
        $user = Auth::user();
        $country = Countries::all();
        if($user->isAdmin() == 1) {
            $checkpoint = Checkpoint::all();
            $purpose = Purpose::all();
            return view('information.create')->with('purposes', $purpose)->with('checkpoints', $checkpoint)->with('countries', $country);
        } else {
            $purpose = Purpose::all();
            return view('information.create')->with('purposes', $purpose)->with('user', $user)->with('countries', $country);
        }
    }

    //////////////////////////////////

    public function store(Request $r){

        $this->Validate($r, [
            'tourist_name' => 'required|string|max:255|min:2',
            ]);

        if($r->country_id == 154){
            $tourist_type = 0;
        } else {
            $tourist_type = 1;
        }

        $year = Carbon::now()->format('Y');
        $month = Carbon::now()->format('m');
        $day = Carbon::now()->format('d');
        $converter = new DateConverter();
        $converter->setEnglishDate($year, $month, $day);
        $nepali_date = $converter->getNepaliYear()."/".$converter->getNepaliMonth()."/".$converter->getNepaliDate();

        $information = Information::create([
            'checkpoint_id' => $r->checkpoint_id,
            'country_id' => $r->country_id,
            'tourist_name' => $r->tourist_name,
            'tourist_type' => $tourist_type,
            'gender' => $r->gender,
            'duration' => $r->duration,
            'passport_number' => $r->passport_number,
            'age' => $r->age,
            'visa_period' => $r->visa_period,
            'nepali_date' => $nepali_date
        ]);


        if($r->purpose_id){
            foreach ($r->purpose_id as $purpose_id){
                UserPurpose::create([
                    'information_id' => $information->id,
                    'purpose_id' => $purpose_id
                ]);
            }
        }

        return redirect()->route('information.index')->with('tourists', $information)->withStatus(__('Information successfully added.'));

        /*if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
        $data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist added successfully');*/
    }

    ///////////////////////////////////

    public function editInformation($id){
        $tourist = Information::find($id);
        $purpose = Purpose::all();
        return view('information.edit')->with('purposes', $purpose)->with('tourist', $tourist);
    }

    //////////////////////////////////

    public function updateInformation(Request $request, $id)
    {
        $this->Validate($request, [
            'tourist_name' => 'required|string|max:255|min:2',
        ]);

        $information = Information::find($id);
        $information->tourist_name = $request->tourist_name;
        $information->age = $request->age;
        $information->gender = $request->gender;
        $information->duration = $request->duration;
        $information->passport_number = $request->passport_number;
        $information->visa_period = $request->visa_period;
        $information->save();

        foreach ($information->userpurpose as $userpurpose) {
            $userpurpose->delete();
        }

        if($request->purpose_id) {
            foreach ($request->purpose_id as $purpose_id) {
                UserPurpose::create([
                    'information_id' => $information->id,
                    'purpose_id' => $purpose_id
                ]);
            }
        }

        return redirect()->route('information.index')->with('tourists', $information)->withStatus(__('Information updated successfully'));

        /*$data = new InformationResource($information);
        return $this->responser($information, $data, 'Information of tourist updated successfully');
   } else {
       return response()->json(['message' => 'Information cannot be edited', 'status' => 403], '403');
   */
    }

    /////////////////////////////////////

    public function searchInformation(Request $filters)
    {
        if($filters->has('submit')) {
            $purposes = Purpose::all();
            $information = $this->search($filters);
            return view('information.index')->with('tourists', $information)->with('purposes', $purposes);
        } elseif($filters->has('exportexcel')){
            $infors = InfoResource::collection($this->search($filters));
            $information = new InformationExport($infors);
            return Excel::download($information, 'information.xlsx');
        }
    }

    public function search(Request $filters){
        if ($filters->has('from') && $filters->has('to')) {
            $information = Information::whereBetween('nepali_date', [$filters->from, $filters->to])->get();

            if ($filters->has('purpose_id')) {
                $purpose_ids = explode(",", $filters->purpose_id);

                foreach ($purpose_ids as $purpose_id) {
                    $userpurpose = UserPurpose::where('purpose_id', $purpose_id)->get();
                    foreach ($userpurpose as $up) {
                        $info_id[] = $up->information_id;
                    }
                }

                foreach ($info_id as $id) {
                    $infos = $information->find($id);
                    if ($infos != null) {
                        $infors[] = $infos;
                    } else {
                        $infors = null;
                    }
                }
                $information = $infors;
            }
        }
        return collect($information);
    }

    public function purposeChart(){
        $purposes = Purpose::all();
        $userpurpose = UserPurpose::all();
        return view('charts.purpose')->with('purposes', $purposes)->with('userpurpose', $userpurpose);
    }

    public function informationChart(){
        $male[] = null; $female[] = null; $others[] = null;
        $informations = Information::all();
        foreach ($informations as $information){
            if($information->gender == 'Male'){
                $male[] = $information;
            } elseif($information->gender == 'Female'){
                $female[] = $information;
            } else {
                $others[] = $information;
            }
        }
        $domestic[] = null; $international[] = null;

        foreach ($informations as $information){
            if($information->tourist_type == 0){
                $domestic[] = $information;
            } else {
                $international[] = $information;
            }
        }


        $checkpoints = Checkpoint::all();
        return view('charts.info')->with('checkpoints', $checkpoints)->with('informations', $information)
            ->with('international', sizeof(array_filter($international)))->with('domestic', sizeof(array_filter($domestic)))
            ->with('male', sizeof(array_filter($male)))->with('female', sizeof(array_filter($female)))->with('others', sizeof(array_filter($others)));
    }

}
