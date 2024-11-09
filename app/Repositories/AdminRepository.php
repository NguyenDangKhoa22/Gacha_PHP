<?php
    namespace App\Repositories;
    use App\Models\Admin;
    class AdminRepository {
        public function adminLogin($username,$password):bool{
            $obj_admin = new Admin();
            return $obj_admin->adminLogin($username, $password) ;
        }
    }