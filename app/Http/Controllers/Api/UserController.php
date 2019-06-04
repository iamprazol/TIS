<?php

namespace App\Http\Controllers\Api;

use App\CheckpointUser;
use App\Role;
use App\UserPurpose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use App\User;
use App\Http\Resources\UserResource as UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $request->email)->first();
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials', 'status' => 400], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token', 'status' => 500 ], 500);
        }
        $data = new UserResource($user);
        return response()->json(['data' => $data,'token' => $token, 'message' => 'Users details listed successfully', 'status' => 200], 200);
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string|max:255|min:2',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required|regex:/^\+?(977)?(98)[0-9]{8}?/|max:14',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        $user = User::create([
            'full_name' => $request->get('full_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->phone,
            'role_id' => $request->role_id
        ]);

        $checkpoint = CheckpointUser::create([
            'user_id' => $user->id,
            'checkpoint_id' => $request->checkpoint_id
        ]);

        $data = new UserResource($user);
        return response()->json(['data' => $data, 'message' => 'User has been created successfully', 'status' => '201'],201);
    }

    public function getAuthenticatedUser()
    {
        $user = Auth::user();
        $data = new UserResource($user);
        return $this->responser($user, $data, 'User details listed successfully');
    }

    public function update(Request $r){

        $validator = Validator::make($r->all(), [
            'full_name' => 'string|max:255|min:2',
            'email' => 'string|email|max:255|unique:users',
            'password' => 'string|min:6|confirmed',
            'phone' => 'regex:/^\+?(977)?(98)[0-9]{8}?/|max:14',
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors(), 'status' => 400], 400);
        }

        $user = Auth::user();
        $user->update($r->all());

        $data = new UserResource($user);
        return $this->responser($user, $data, "Your details has been updated successfully");
    }

    ////////////////////////////////////

    public function makeAdmin($id){
        $user = User::find($id);
        if($user->role_id == 2){
            $user->role_id = 1;
            $user->save();

            $data = new UserResource($user);
            return response()->json(['data' => $data, 'message' => 'Checkpoint user made Super Admin successfully', 'status' => 200],200);
        } else {
            return response()->json([ 'message' => 'Action not permitted', 'status' => 400],400);
        }
    }

    public function removeAdmin($id){
        $user = User::find($id);
        if($user->role_id == 1){
            $user->role_id = 2;
            $user->save();
            $data = new UserResource($user);
            return response()->json(['data' => $data, 'message' => 'Super Admin removed successfully', 'status' => 200],200);
        } else {
            return response()->json([ 'message' => 'Action not permitted', 'status' => 400],400);
        }
    }

    public function disableUser($id){
        $user = User::find($id);
        if($user->disable == 0){
            $user->disable = 1;
            $user->save();
            $data = new UserResource($user);
            return response()->json(['data' => $data, 'message' => 'User disabled successfully', 'status' => 200],200);
        } else {
            return response()->json([ 'message' => 'Action not permitted', 'status' => 400],400);
        }
    }

    public function enableUser($id){
        $user = User::find($id);
        if($user->disable == 1){
            $user->disable = 0;
            $user->save();
            $data = new UserResource($user);
            return response()->json(['data' => $data, 'message' => 'User enabled successfully', 'status' => 200],200);
        } else {
            return response()->json([ 'message' => 'Action not permitted', 'status' => 400],400);
        }
    }

    public function userList(){
        $user_id = Auth::id();
        $users = User::where('id', '!=', $user_id )->orderBy('full_name', 'asc')->get();
        $data = UserResource::collection($users);
        return $this->responser($users, $data, 'Customers Listed Successfully');
    }

    public function logout(Request $request)
    {
        try {
            JWTAuth::invalidate($request->header('Authorization'));
            return response()->json(['success' => true, 'message' => "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.'], 500);
        }
    }

}