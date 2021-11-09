<?php

namespace App\Controllers;
use App\Models\UserRegisterModel;
use CodeIgniter\Controller;

class User extends BaseController
{
    public function index()
    {
        return view('userdashboard');
    }
    public function register()
    {
        return view('register');
    }
    public function store()
    {
        helper(['form', 'url']);
       $file = $this->request->getFile('photo');
       if($file->isValid() && !$file->hasMoved())
       {
            $imageName = $file->getRandomName();
            $file->move('public/upload', $imageName);
       }
        $database = \Config\Database::connect();

        $validation = \config\Services::validation();
           
        $check = $this->validate([
            'username'          => 'required|min_length[2]|max_length[50]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[user_register.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ]);
        
        if(!$check)
        {
                return view('register', ['validation'=>$this->validator]);     
        }
        else
        {       
            $model = new UserRegisterModel();
          
            $data = [
                        'username'     => $this->request->getVar('username'),
                        'email'    => $this->request->getVar('email'),
                        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                        'photo' =>$imageName,
                        
                   ];
        
            $model->insert($data);
         
            return redirect()->to(base_url('user/login'));
        }
        return view('register');
        
    }
    public function login()
    {
        return view('login');
    }
    public function loginAuth()
    {
        $session = session();

        $userregisterModel = new UserRegisterModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $data = $userregisterModel->where('email', $email)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to(base_url('profile'));
            
            }
            else
            {
                $session->setFlashdata('msg', 'Password is incorrect.');
                return redirect()->to(base_url('user/login'));
            }

        }else{
            $session->setFlashdata('msg', 'Email does not exist.');
            return redirect()->to(base_url('user/login'));
        }
    }
    // public function profile()
    // {
    //    $session = session();       
    //    return view('profile');
    // }
    public function about()
    {
       return view('about');
    }
    public function courses()
    {
        return view('courses');
    }
    public function courses_single()
    {
        return view('courses_single');
    }
    public function display()
    {
        return view('display');
    }
    public function mojo()
    {
        return view('display');
    }
    public function payment()
    {
        return view('payment');
    }
    public function contact()
    {
        return view('contact');
    }

}
