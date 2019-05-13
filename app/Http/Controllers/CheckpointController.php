<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkpoint;
use App\Http\Resources\CheckpointResource as CheckpointResource;
use Illuminate\Support\Facades\Validator;

class CheckpointController extends Controller
{
    public function index(){
        $checkpoint = Checkpoint::all();
        $data = CheckpointResource::collection($checkpoint);
        return $this->responser($checkpoint, $data, 'Checkpoints listed successfully');
    }

    public function addCheckpoint(Request $r){
        $validator = Validator::make($r->all(), [
            'checkpoint_name' => 'required|string|max:255|min:2'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        $checkpoint = Checkpoint::create($r->all());
        $data = new CheckpointResource($checkpoint);
        return $this->responser($checkpoint, $data, 'Checkpoint added successfully');
    }

    public function deleteCheckpoint($id){
        $checkpoint = Checkpoint::find($id);
        $checkpoint->delete();
        return response()->json(['message' => 'The specified checkpoint Deleted successfully', 'status' => 200], 200);
    }
}
