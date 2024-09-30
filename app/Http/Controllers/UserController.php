<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
// use Illuminate\Contracts\Validation\Rule;

class UserController extends Controller
{
    public function registerpage(){
        return view("register");
    }

    public function registerUser(Request $request){
        $incomingData = $request->validate([
            "name"=> ['required', 'min:3', 'max:20', Rule::unique('users', 'name')],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => ['required', 'min:8', 'confirmed']
        ]);
        $incomingData['password'] = bcrypt($incomingData['password']);

        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/')->with('success', 'Thank you for creating an account.');
    }


    //Login
    public function login(){
        return view("login");
    }

    public function LoggingIn(Request $request){
        $incomingData = $request->validate([
            "email"=>"required",
            "password"=>"required"
        ]);
        if(auth()->attempt(['email'=>$incomingData['email'], "password"=>$incomingData['password']])){
            return redirect("/")->with("success", "You're logged in.");
        }else{
            // return "failed";
            return back()->with("failed", "Invalid Credentials");
        }
    }

    public function logout(){
        auth()->logout();
        return redirect('/')->with('logout', "You've logged out.");
    }
}
