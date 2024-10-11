<?php
    namespace App\Repositories;
    use App\Models\User;
    class UserRepository{
        public function insertUser(array $input): User{
            return User::insertUser($input);
        }
        public function checkUser( $userName,$password): bool{
            return User::checkUser($userName,$password);
        }
    }
    