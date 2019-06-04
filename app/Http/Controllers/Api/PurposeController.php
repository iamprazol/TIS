<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Purpose;
use App\Http\Resources\PurposeResource;
use Illuminate\Support\Facades\Validator;


class PurposeController extends Controller
{
    public function index(){
        $purpose = Purpose::orderBy('purpose', 'asc')->get();

        $data = PurposeResource::collection($purpose);
        return $this->responser($purpose, $data, 'Purposes listed successfully');
    }

    public function addPurpose(Request $r){
        $validator = Validator::make($r->all(), [
           'purpose' => 'required|string|max:255|min:2'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }


        $purpose = Purpose::create($r->all());

        $data = new PurposeResource($purpose);
        return $this->responser($purpose, $data, "Purpose added successfully");
    }

    public function deletePurpose($id){
        $purpose = Purpose::find($id);
        $purpose->delete();
        return response()->json(['message' => 'The specified purpose Deleted successfully', 'status' => 200], 200);

    }
}
