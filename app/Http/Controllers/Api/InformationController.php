<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Checkpoint;
use App\Countries;
use App\Exports\InformationExport;
use App\Http\Resources\InfoResource;
use App\Request as Req;
use App\Purpose;
use App\User;
use App\UserPurpose;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Information;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InformationResource as InformationResource;
use App\DateConverter;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::orderBy('checkpoint_id', 'asc')->orderBy('created_at', 'asc')->get();
        foreach ($informations as $i) {
            $now = Carbon::now();
            $aday = Carbon::parse($i->created_at)->addDay();
            if ($now >= $aday) {
                $i->editable = 0;
                $i->save();
            }
        }

        $data = InfoResource::collection($informations);
        return $this->responser($informations, $data, "All Tourist Information Listed Successfully");
    }

    //////////////////////////////////

    public function addInformation(Request $r){

        $validator = Validator::make($r->all(), [
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

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }
        $data = new InfoResource($information);
        return $this->responser($information, $data, 'Information of tourist added successfully');
    }

    ///////////////////////////////////

    public function editInformation(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tourist_name' => 'required|string|max:255|min:2',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

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
        $data = new InfoResource($information);
        return $this->responser($information, $data, 'Information of tourist updated successfully');

    }

    /////////////////////////////////////

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

        $data = InfoResource::collection(collect($information));
        return $this->responser(collect($information), $data, "Information search are listed successfully");
    }

    ////////////////////////////////////

    public function requestForEdit($id){
        $information = Information::find($id);
        Req::create([
            'information_id' => $id,
            'user_id' => Auth::id()
        ]);
        $data = new InfoResource($information);
        return $this->responser($information, $data, "Information edit request sent successfully");
    }

    public function requestApprove($id){
        $requests = Req::find($id);
        $requests->is_approved = 1;
        $requests->save();

        $request = Req::orderBy('created_at', 'asc')->where('is_approved', 0)->get();
        $data = new InfoResource($request);
        return $this->responser($request, $data, "Information edit request approved successfully");
    }

    public function requestReject($id){
        $requests = Req::find($id);
        $requests->delete();

        $request = Req::orderBy('created_at', 'asc')->where('is_approved', 0)->get();
        $data = new InfoResource($request);
        return $this->responser($request, $data, "Information edit request rejected successfully");
    }

    public function requestIndex(){
        $request = Req::orderBy('created_at', 'asc')->where('is_approved', 0)->get();
        $data = InfoResource::collection($request);
        return $this->responser($request, $data, "All Information edit request Listed successfully");
    }

    public function myRequestIndex(){
        $user_id = Auth::id();
        $request = Req::orderBy('created_at', 'asc')->where('user_id', $user_id)->where('is_approved', 1)->get();
        $data = InfoResource::collection($request);
        return $this->responser($request, $data, "Your Information edit request Listed successfully");
    }

}
