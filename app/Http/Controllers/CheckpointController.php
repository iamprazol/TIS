<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checkpoint;
use App\Http\Resources\CheckpointResource as CheckpointResource;
use Illuminate\Support\Facades\Validator;

class CheckpointController extends Controller
{
    public function index(){
        $checkpoint = Checkpoint::orderBy('checkpoint_name', 'asc')->paginate(15);
        return view('checkpoint.index')->with('checkpoints', $checkpoint);

/*        $data = CheckpointResource::collection($checkpoint);
        return $this->responser($checkpoint, $data, 'Checkpoints listed successfully');*/
    }

    public function create(){
        return view('checkpoint.create');
    }

    public function store(Request $r){
        $this->Validate($r, [
            'checkpoint_name' => 'required|string|max:255|min:2'
        ]);

        $checkpoint = Checkpoint::create($r->all());
        return redirect()->route('checkpoint.index')->with('checkpoints', $checkpoint)->withStatus(__('Checkpoint successfully added.'));

        /*$data = new CheckpointResource($checkpoint);
        return $this->responser($checkpoint, $data, 'Checkpoint added successfully');*/
    }

    public function deleteCheckpoint($id){
        $checkpoint = Checkpoint::find($id);
        $checkpoint->delete();
        return redirect()->route('checkpoint.index')->with('checkpoints', $checkpoint)->withStatus(__('Checkpoint successfully deleted'));

        // return response()->json(['message' => 'The specified checkpoint Deleted successfully', 'status' => 200], 200);
    }
}
