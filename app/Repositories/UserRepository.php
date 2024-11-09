<?php
    namespace App\Repositories;
    use App\Models\User;
    class UserRepository{
        public function insertUser(array $input): User{
            $obj_user = new User;
            return $obj_user->insertUser($input);
        }
        public function checkUser( $userName,$password): bool{
            $obj_user = new User;
            return $obj_user->checkUser($userName,$password);
        }
        public function getUser(){
            $obj_user = new User;
            return $obj_user->getListUser();
        }
    }
    