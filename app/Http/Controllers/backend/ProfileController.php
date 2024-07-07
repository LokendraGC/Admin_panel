<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function allUser(){

        $users = User::get();
        return view('backend.user_profile.index-user',[
            'users' => $users
        ]);
    }

    public function createUser(){
        return view('backend.user_profile.create-user');
    }

    public function register(Request $request){

        // return $request;

        $data = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed'
            ]);

            $user = User::create($data);

            if ( $user ){
                return redirect()->route('admin.login');
            }

    }

    public function checkDashboard(){
            if( Auth::check() ){
                return to_route('admin.dashboard');
            }else{
                return to_route('admin.login');
            }
    }

    public function edit(string $user_id){
            $user = User::find($user_id);
            return view('backend.user_profile.edit-user',[
                'user' => $user
            ]);
    }

    public function update(Request $request){

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = Auth::user();

        if ( Hash::check( $request->input('current_password'), $user->password ) ){

            // update the password
            $user->password = bcrypt($request->input('password'));
            $user->save();

            return redirect()->route('user.all')->with('success','Password Update Successfully');
        }else{
            return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect']);
        }
    }
}
