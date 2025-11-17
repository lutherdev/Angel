<?php

namespace App\Controllers;

class ReturnItem extends BaseController
{
    public function index(): string
    {   
        return view('homepage');
    }
}
