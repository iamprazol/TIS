<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\CheckPointUserResource;
use Illuminate\Http\Request;
use App\CheckpointUser;

class CheckpointUserController extends Controller
{
    public function index(){
        $checkpointuser = CheckpointUser::all();
        $data = CheckpointUserResource::collection($checkpointuser);
        return $this->responser($checkpointuser, $data, 'User with their respective checkpoints listed successfully');
    }
}
