<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Checkpoint;
use App\CheckpointUser;
use App\Role;
use App\User;
use App\Http\Requests\UserRequest;
use Carbon\Carbon;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->where('id', '!=', Auth::id())->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $checkpoint = Checkpoint::all();
        $role = Role::find(2);
        return view('users.create')->with('checkpoints', $checkpoint)->with('role', $role);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $user = User::create($request->merge(['password' => Hash::make($request->get('password'))])->except('checkpoint_id'));

        CheckpointUser::create([
           'user_id' => $user->id,
           'checkpoint_id' => $request->checkpoint_id
        ]);
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User  $user)
    {
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password'))])
                ->except([$request->get('password') ? '' : 'password']
        ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }

    public function makeAdmin($id){
        $user = User::find($id);
        if($user->role_id == 2){
            $user->role_id = 1;
            $user->save();
            return redirect()->route('user.index')->withStatus(__('Status changed to Super Admin Successfully.'));
        } else {
            return redirect()->route('user.index')->withStatus(__('Action not permitted.'));
        }
    }

    public function removeAdmin($id){
        $user = User::find($id);
        if($user->role_id == 1){
            $user->role_id = 2;
            $user->save();
            return redirect()->route('user.index')->withStatus(__('Status changed to Checkout Admin Successfully.'));
        } else {
            return redirect()->route('user.index')->withStatus(__('Action not permitted.'));
        }
    }

    public function disableUser($id){
        $user = User::find($id);
        if($user->disable == 0){
            $user->disable = 1;
            $user->save();
            return redirect()->route('user.index')->withStatus(__('User Disabled Successfully.'));
        } else {
            return redirect()->route('user.index')->withStatus(__('Action not permitted.'));
        }
    }

    public function enableUser($id){
        $user = User::find($id);
        if($user->disable == 1){
            $user->disable = 0;
            $user->save();
            return redirect()->route('user.index')->withStatus(__('User Enabled Successfully.'));
        } else {
            return redirect()->route('user.index')->withStatus(__('Action not permitted.'));
        }
    }

    public function forgotPassword(){
        return view('auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
        'email' => 'required|email',
        ]);

            if( $user = User::where('email', $request->input('email') )->first() )
            {
                $token = Str::random(64);

                DB::table(config('auth.passwords.users.table'))->insert([
                    'email' => $user->email,
                    'token' => $token,
                    'created_at' => Carbon::now()
                ]);

                Notification::send($user , new \App\Notifications\PasswordResetNotification($token));
                return redirect()->route('login')->withStatus(__('Password Reset Email Has Been Sent'));

            } else {
                return redirect()->back()->withErrors($validator->errors()->add('email', 'Email not found'));
            }


    }

    public function resetPasswordForm($token){
        return view('auth.passwords.reset')->with('token', $token);
    }

    public function resetPassword(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|same:password',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('login')->withStatus(__('Password Changed Successfully .'));

    }
}
