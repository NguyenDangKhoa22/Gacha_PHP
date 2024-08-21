<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Response\Response;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Response
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors(),);
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

        $success['user'] = $user;

        return $this->sendResponse($success,'User register successfully');
    }
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validate Error.', $validator->errors());
        }

        $user = User::where('email',$request->email)->first();

        if(!$user || !Hash::check($request->password,$user->password)){
            return $this->sendError('Unauthorized',['error' => 'Invalid credentials']);
        }

        $token = auth()->login($user);

        return $this->sendResponse($this->responWithToken($token),"User login sucessfully");
    }
    public function logout(){

        $success = auth()->logout();

        return $this->sendResponse($success,'logout successfull');
    }
    public function refresh(){

        $success = auth()->user();

        return $this->sendResponse($success,'Profile fetch successfully');

    }
    public function profile(){

        $success = auth()->user();

        return $this->sendResponse($success,'Profile fetch successfully');

    }
    protected function responWithToken ($token){

        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
        ];
        
    }
}
