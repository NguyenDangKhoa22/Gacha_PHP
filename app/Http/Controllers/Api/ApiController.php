<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ApiController extends Controller
{
    //POST [ name, email, passsword ]
    public function register(Request $request){
        //Validation
        $request->validate([
            "name"=>"required|string",
            "email"=>"required|string|email|unique:users",
            "password"=>"required|confirmed",//confirmed : cần đối chiếu password vd password_confirmation
        ]);
        //Create User
        User::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>bcrypt($request->password)
        ]);
        return response()->json([
            "status"=> true,
            "message"=>"User register successfully",
            "data" => []
        ]);
    }
    //POST [ email, password ]
    public function login(Request $request){
        
    }
    //GET [Auth: Token]
    public function profile(){

    }
    //GET [Auth: Token]
    public function logout(){

    }
}
