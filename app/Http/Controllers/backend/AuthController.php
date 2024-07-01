<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin(){
        // dd(Hash::make('123456'));
        return view('backend.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ( Auth::attempt($request->only('email','password')) ){
            return redirect()->route('admin.dashboard');
        }
        else {
            Auth::logout();
            return back()->with('error','wrong credentials');
        }
    }

    public function getLogOut(){
        Auth::logout();
        return redirect()->route('login');
    }
}
