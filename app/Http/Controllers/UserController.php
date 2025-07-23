<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $username = $request->input("username");
        $password = $request->input("password");

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $isLogin = Auth::attempt(["email" => $username, "password" => $password]);
        
        if( $isLogin ){
            $user = $request->user();
            return redirect()->intended("dashboard");
        } else {
            return back()->withErrors(["error" => "Invalid Credentials"]);
        }
    }

    public function register(Request $request){
        $username   = $request->input("username");
        $email      = $request->input("email");
        $password   = $request->input("password");
        $name       = $request->input("name");
        $isShop       = $request->input("shop");

        $exists = User::where("username", $username )->first();//retrieve all records that aligns with the where

        if( $exists ){
            return back()->withErrors(["error" => "Username Already Exists, Choose Another"]);
        }

        $exists  = User::where("email", $email )->first();

        if( $exists ){
            return back()->withErrors(["error" => "Email Taken, Choose Another"]);
        }

        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'name'     => 'required',
            'email'    => 'required|email'
        ]);

        $isLogin = User::create([
             'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            "username" => $username,
        ]);

        
        if( $isLogin ){
            if( $isShop ){
                $shop_name = $request->input("shop_name");
                $shop_add = $request->input("shop_add");
                $shop_phone = $request->input("shop_phone");
                Shop::create([
                    "user_id"   => $isLogin->id,
                    "name"      => $shop_name,
                    "address"   => $shop_add,
                    "phone"     => $shop_phone
                ]);
            }
            return redirect()->intended("dashboard");
        } else {
            return back()->withErrors(["error" => "Registeration Failed"]);
        }
    }


}
