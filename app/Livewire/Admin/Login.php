<?php
    namespace App\Livewire\Admin;
    use Livewire\Component;
    use App\Repositories\AdminRepository;
    class Login extends Component{
        public $userName,$password;
        public $rules = [
            'userName' => 'required',
            'password'=>'required',
        ];
        public function login(AdminRepository $admin){
            if($admin->adminLogin($this->userName,$this->password)==true){
                session()->flash('message', 'admin login successfull');
                return redirect()->route('admin');
            }
            else{
                session()->flash('message', 'User login fail');
                return redirect()->route('404');
            }
        }
        public function render(){
            return view('livewire.admin.login');
        }
    }