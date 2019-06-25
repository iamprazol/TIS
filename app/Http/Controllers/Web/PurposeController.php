<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purpose;
use App\Http\Resources\PurposeResource;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;


class PurposeController extends Controller
{
    public function index(){
        $purpose = Purpose::orderBy('purpose', 'asc')->paginate(15);
        foreach ($purpose as $p){
            $now = Carbon::now();
            $aday = Carbon::parse($p->created_at)->addDay();
            if($now >= $aday) {
                $p->editable = 0;
                $p->save();
            }
        }

        return view('purpose.index')->with('purposes', $purpose);
    }

    public function create(){
        return view('purpose.create');
    }

    public function store(Request $r){
        $this->Validate($r, [
           'purpose' => 'required|string|max:255|min:2|unique:purposes'
        ]);
        $purpose = Purpose::create($r->all());

        return redirect()->route('purpose.index')->with('purposes', $purpose)->withStatus(__('Purpose successfully added.'));
    }

    public function edit($id){
        $purpose = Purpose::find($id);
        return view('purpose.edit')->with('purpose', $purpose);
    }

    public function update(Request $r, $id){
        $this->Validate($r, [
            'purpose' => 'required|string|max:255|min:2'
        ]);

        $purpose = Purpose::find($id);
        $purpose->purpose = $r->purpose;
        $purpose->save();
        return redirect()->route('purpose.index')->with('purpose', $purpose)->withStatus(__('Purpose successfully updated.'));
    }

    public function deletePurpose($id){
        $purpose = Purpose::find($id);
        $purpose->delete();
        return redirect()->route('purpose.index')->with('purposes', $purpose)->withStatus(__('Purpose successfully deleted'));

    }
}
