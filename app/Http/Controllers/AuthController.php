<?php

namespace App\Http\Controllers;
use App\Http\Controllers\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $success['user'] = $user;
        return $this->sendResponse($success,'User register successfully');
    }
    public function login(){
        $credetials = request(['email','password']);
        if(!$token = auth()->attempt($credetials)){
            return $this->sendError('Unathorized.',['error'=>'Unathorized']);

        }
        $success = $this->responWithToken($token);

        return $this->sendResponse($success,'User login successfully');
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
