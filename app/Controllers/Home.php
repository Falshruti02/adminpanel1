<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('payment');
    }
    public function display()
    {
        return view('display');
    }
}
