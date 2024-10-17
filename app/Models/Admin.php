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

    protected $fillable = ['name', 'password'];

    public static function adminLogin($userName,$password):bool{
        $admin = Admin::where('name',$userName)->first();
        if($admin && Hash::check($password,$admin->password)){
            return true;
        }
        return false;
    }
    public static function addAdmin($user, $password): Admin
    {
        return self::create([
            'user' => $user,  // Đảm bảo rằng bạn đang chèn giá trị cho cột 'user'
            'password' => Hash::make($password),
        ]);
    }
}
