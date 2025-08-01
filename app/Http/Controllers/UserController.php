<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Shop;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Models\Chat;

class UserController extends Controller
{
    //
    public function login(Request $request){
        $username = $request->input("username");
        $password = $request->input("password");

        $request->validate([
            'username' => 'required|max:23|min:6|unique:users,username|regex:/[a-z]/|regex:/[A-Z]/',
            'password' => 'required|after::username',
            'email'     => 'email|in::table_name',
            'mark_words'   => 'required|notin::kool,bath,poison,raise,other',
            'photo'        => 'file|mimes:jpg,png|max:2048'
        ]);

        /*
        required - to check if a field is available in the request
        date - if the field is formatted as a date and be read as a date
        after - checks a particular field and verifies if that field is set before verifying the current
        email - checks if a field is an email
        in      - showing if a value is in a list of values,
        notin   - showing is a value is not in a list of values
        file    - is a way of verifying that a particular input is a file
        mimes   - is a way of verifying the file type
        unique  - checks a particular table in database to see if that value entering into the database is actually unique
        confirmed - works with a password field to check if that filed has been confirmed by the user
        regex   - 
        */

        $isLogin = Auth::attempt(["email" => $username, "password" => $password]);
        
        if( $isLogin ){
            $user = $request->user();
            return redirect()->intended("dashboard");
        } else {
            return back()->withErrors(["error" => "Invalid Credentials"]);
        }
    }

    public function register(UserRequest $request){
        $username   = $request->input("username");
        $email      = $request->input("email");
        $password   = $request->input("password");
        $name       = $request->input("name");
        $isShop       = $request->input("shop");
        $validated  = $request->validated();
        $username   = $validated['username'];

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

        event(new SendMail([
            "to" => $email,
            "message"   => "Hello $first_name, You've successfully registered with SOSO Website, Use this link to activate your account",
            "subject"   => "User Registered",
            "cc"        => []
        ]));

        
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

    public function chat(Request $request){
        $message = $request->input("message");
        $user_id = $request->input("userID");
        $chat_id = $request->input("chatID");
        broadcast(new Chat($message, $user_id, $chat_id));
    }

    public function view_chat(Request $request){
        $user = $request->user();       

        if( is_null( $user ) ){
            return redirect("/login");
        }

         $chat = Chat::where("user_id", $user->id)->get();

        return view("chats.chat", [
            "user_id"   => $user->id,
            "chats"     => $chats
        ]);
    }
}
