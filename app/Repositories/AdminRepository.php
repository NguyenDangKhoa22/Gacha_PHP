<?php
    namespace App\Repositories;
    use App\Models\Admin;
    class AdminRepository {
        public function adminLogin($username,$password):bool{
            return  Admin::adminLogin($username,$password);
        }
    }