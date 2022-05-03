<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        // VALIDATE THE INPUTS 
        $validate = $request->validate([
            'name'=> "required|unique:users,email",
            'email'=> "required", 
            'password' =>"required"
        ]);
        $user = User::create([
            'name'=> $validate["name"],
            'email'=>$validate["email"],
            'password'=>$validate["password"]
        ]);

        $token = $user->createToken('userAuth');
        return ['token' => $token->plainTextToken];
        // CREATE THE USERS RECORDS 
        // ADD TOKEN TO THE USERS
        // RETURN THE USER DETAILS AND TOKEN
        return $request;
    }
}
