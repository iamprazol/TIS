<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purpose;
use App\Http\Resources\PurposeResource;
use Illuminate\Support\Facades\Validator;


class PurposeController extends Controller
{
    public function index(){
        $purpose = Purpose::orderBy('purpose', 'asc')->paginate(15);
        return view('purpose.index')->with('purposes', $purpose);
        /*$data = PurposeResource::collection($purpose);
        return $this->responser($purpose, $data, 'Purposes listed successfully');*/
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
        /*$data = new PurposeResource($purpose);
        return $this->responser($purpose, $data, "Purpose added successfully");*/
    }

    public function deletePurpose($id){
        $purpose = Purpose::find($id);
        $purpose->delete();
        return redirect()->route('purpose.index')->with('purposes', $purpose)->withStatus(__('Purpose successfully deleted'));

    }
}
