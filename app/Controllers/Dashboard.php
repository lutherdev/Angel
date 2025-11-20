<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(){
        $role = session()->get('role'); 
        if ($role == 'Personnel') {
            return view('dashboard_personnel');
        } else if ($role == 'Associate') {
            return view('dashboard_associate');
        } else if ($role == 'God'){
            return view('homepage');
        } else {
            return redirect()->to('login');
        }
    }
}
