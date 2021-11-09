<?php

namespace App\Controllers;
use App\Models\AdminModel;
use CodeIgniter\Controller;


class Admin extends BaseController
{
    private $facebook=NULL;
    private $fb_helper=NULL;
    function __construct()
    {
        require_once APPPATH. 'Libraries/vendor/autoload.php';
        $this->facebook = new\Facebook\Facebook([
            'app_id'=> '902799380337555',
            'app_secret' => '321bebecd7a0cd225b4d4843514c3c98',
            'default_graph_version' =>'v2.3'
        ]);
        $this->fb_helper = $this->facebook->getRedirectLoginHelper();
    }
    
    public function index()
    {
        $fb_permission = ['email'];
        $data['fb'] = $this->fb_helper->getLoginUrl('http://localhost/login_fb/admin/authWithFB?',$fb_permission);
        return view('admin/login');
    }
    
    public function insert()
    {
       helper(['form','url']);

        $validation = \config\Services::validation();
        $check = $this->validate([
            'name'=>'required',
            'email'=>'required|valid_email',
            'password'=>'required|'
        ]);
        if(!$check)
        {
            return view('admin/signup', ['validation'=>$this->validator]);
        }
        else
        {
            // $encrypter = \config\Services::encrypter();
            $model = new AdminModel();
            $data = [
                        'name' =>$this->request->getVar('name'),
                        'email' =>$this->request->getVar('email'),
                        'password' =>$this->request->getVar('password')
                   ];
        
            $model->insert($data);
            return view('admin/login');
        }
        return view('admin/signup');
    }
    
    public function login()
    {
        return view('admin/login');
    }

    public function loginuser()
    {
        $session = session();
        $model = new AdminModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();
        if($data)
        {
            $pass = $data['password'];
            // $verify_pass = password_verify($password, $pass);
            if($pass)
            {
                $ses_data = [
                                'id'       => $data['id'],
                                'name'     => $data['name'],
                                'email'    => $data['email'],
                                'logged_in'     => TRUE
                            ];

                $session->set($ses_data);
                return redirect()->to(base_url('admin/dashboard'));
            }
            else
            {
                $session->setFlashdata('msg', 'Wrong Password');
                return redirect()->to(base_url('admin'));
            }
        }
        else
        {
            $session->setFlashdata('msg', 'Email not Found');
        //     $validation = \config\Services::validation();
        //     $check = $this->validate([
        //         'email'=>'required|valid_email',
        //         'password'=>'required|min_length[6]'
        //     ]);
        // if(!$check)
        // {
        //     return view('admin/login', ['validation'=>$this->validator]);
        // }
            return redirect()->to(base_url('admin'));
        }
    }
    
    public function authWithFB()
    {
        if($this->request->getVar('state'))
        {
            $this->fb_helper->getPersistentDataHandler()->set('state',$this->request->getVar('state'));
        }
        if($this->request->getVar('code'))
        {
            if(session()->get("access_token"))
            {
                $access_token = session()->get('access_token');
            }
            else
            {
                $access_token = $this->fb_helper->getAccessToken();
                session()->set("access_token", $access_token);
                $this->facebook->setDefaultAccessToken(session()->get('access_token'));
            }
            $graph_response = $this->facebook->get("/me?fields=name,email", $access_token);
            print_r($graph_response);
            $fb_user_info = $graph_response->getGraphUser();
            print_r($fb_user_info);
            die;
        }
    }
    
    public function dashboard()
    {
        $session = session();
        return view('admin/dashboard');
    }   
    
    public function profile()
    {
        $session = session();
        return view('admin/profile');     
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('admin/login'));
    }

    public function forgot_password()
    {
        return view('admin/forgot_password');
    }

    public function forgot()
    {
        $validation = \config\Services::validation();
        $check = $this->validate([
            'email'=>'required'
        ]);
        if(!$check)
        {
            return view('admin/forgot_password', ['validation'=>$this->validator]);
        }
        else
        {
            $data =['email' =>$this->request->getVar('email'),
                    'password' =>$this->request->getVar('password')
                    ];
            $model = new UserModel();
            $result = $model->where('email',$this->request->getVar('email'))->first();
            echo "<h6>Email =".$result['email'];
            echo "<br>";
            echo "Password =".$result['password'];
             $to = $result['email'];
            $subject = 'Reset Password';
            $message = 'Hii ' .$result['name'] . ',<br><br> Your New Password:' .$result['password'];

            $email = \Config\Services::email();
            $email->setTo($to);
            $email->setFrom('info@gophp.in','Info');

            $email->setSubject($subject);
            $email->setMessage($message);
            if($email->send())
            {
                echo "<br>Email successfully sent.";
            }
            else
            {
                $data = $email->printDebugger(['header']);
                print_r($data);
            }
            return view('admin/forgot_password',$data);           
        }
    }
}