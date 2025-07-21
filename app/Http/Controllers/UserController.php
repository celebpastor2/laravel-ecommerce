<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $username = $request->input("username");
        $password = $request->input("password");

        $isLogin = auth()->attempt(["email" => $username, "password" => $password]);
        $request->user();
        if( $isLogin ){
            return redirect()->intended("dashboard");
        } else {
            return back()->withError(["error" => "Invalid Credentials"]);
        }
    }

    public function register(Request $request){

    }


}
