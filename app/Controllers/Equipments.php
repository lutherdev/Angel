<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {   
        return view('include/navbar')
        . view('homepage');
    }
}
