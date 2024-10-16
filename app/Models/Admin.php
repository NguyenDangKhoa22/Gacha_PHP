<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Admin extends Authenticatable
{
    use HasFactory;
    protected string $admin = 'admins';

    public static function adminLogin($userName,$password):bool{
        $user = Admin::where('user',$userName);
        if($user && Hash::check($password,$user->password)){
            return true;
        }else{
            return false;
        }
    }
}
