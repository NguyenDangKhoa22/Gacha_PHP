<?php
    namespace App\Repositories;
    use App\Models\User;
    use Illuminate\Support\Facades\Hash;
    class UserRepository{
        public function addUser($input){
            $objUser = new User();
            $data = [
                'name' => $input['name'],
                'email' => $input['email'],
                'password' => Hash::make($input['password'])
            ];
            
            return $objUser::create($data);
        }
    }
    