<?php

namespace App\Http\Controllers\Web;

use App\Checkpoint;
use App\Countries;
use App\Exports\InformationExport;
use App\Http\Resources\InfoResource;
use App\Information;
use App\Purpose;
use App\UserPurpose;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ExitInfo;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExitInfoController extends Controller
{
    public function index()
    {
        if(Auth::user()->role_id == 2 ) {
            $checkpoint_id = Auth::user()->checkpointuser->checkpoint_id;
            $informations = ExitInfo::orderBy('nepali_date', 'desc')->where('checkpoint_id', $checkpoint_id)->paginate(15);
        } else {
            $informations = ExitInfo::orderBy('nepali_date', 'desc')->orderBy('checkpoint_id', 'asc')->paginate(15);
        }
        return view('exit.index')->with('tourists', $informations);
    }

    ////////////////////////////

    public function create(){
        $user = Auth::user();
        $country = Countries::all();
        if($user->isAdmin() == 1) {
            $checkpoint = Checkpoint::all();
            return view('exit.create')->with('checkpoints', $checkpoint)->with('countries', $country);
        } else {
            return view('exit.create')->with('user', $user)->with('countries', $country);
        }
    }

    //////////////////////////////////

    public function store(Request $r){

        $this->Validate($r, [
            'tourist_name' => 'required|string|max:255|min:2',
        ]);

        if(Auth::user()->role_id == 2){
            $checkpoint_id = Auth::user()->checkpointuser->checkpoint_id;
        } else {
            $checkpoint_id = $r->checkpoint_id;
        }

        if($r->country_id == 154){
            $tourist_type = 0;
        } else {
            $tourist_type = 1;
        }

        if(isset($r->passport_number)){
            $passport = $r->passport_number;
        } else {
            $passport = 'N/A';
        }

        $information = ExitInfo::create([
            'checkpoint_id' => $checkpoint_id,
            'countries_id' => $r->country_id,
            'tourist_name' => $r->tourist_name,
            'tourist_type' => $tourist_type,
            'gender' => $r->gender,
            'passport_number' => $passport,
            'nepali_date' => $r->nepali_date,
            'reviews' => $r->reviews
        ]);


        return redirect()->route('exit.create')->withStatus(__('Exiting Tourists Information successfully added.'));
    }

    ////////////////////////

    public function delete($id){
        $exit = ExitInfo::find($id);
        $exit->delete();

        return redirect()->route('exitinfo.index')->withStatus(__('Exiting Tourists Information successfully deleted.'));

    }

    ////////////////////////

    public function searchInformation(Request $filters)
    {
        if($filters->has('submit')) {
            $information = $this->search($filters);
            return view('exit.search')->with('tourists', $information);
        }
    }

    ////////////////////////

    public function search(Request $filters){
        if ($filters->has('from') && $filters->has('to')) {
            $information = ExitInfo::whereBetween('nepali_date', [$filters->from, $filters->to])->get();
        }
        return collect($information);
    }

    ////////////////////////

    public function valid(){
        return view('exit.valid');
    }

    ///////////////////////

    public function validateInfo(Request $request){
        $entry = Information::where('passport_number', $request->passport_number)->where('tourist_name', 'like', '%'.$request->tourist_name.'%')->first();
        $exit = ExitInfo::where('passport_number', $request->passport_number)->where('tourist_name', 'like', '%'.$request->tourist_name.'%')->first();
        return view('exit.checkvalidation')->with('entry', $entry)->with('exit', $exit);
    }
}
