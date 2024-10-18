<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Throwable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';

    protected $fillable = ['user', 'password'];

    public static function adminLogin($userName,$password):bool{
        try {
            $admin = Admin::where('user', $userName)->first();
            if ($admin && Hash::check($password, $admin->password)) {
                return true;
            }else{
                return false;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
    public static function addAdmin($user, $password): Admin
    {
        return self::create([
            'user' => $user,  
            'password' => Hash::make($password),
        ]);
    }
}
