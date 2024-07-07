<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
}
