<?php

namespace App\Controllers;
use App\Models\UserRegisterModel;
use CodeIgniter\Controller;

class Profile extends BaseController
{
    public function index()
    {
        return view('profile');
    }
}
?>