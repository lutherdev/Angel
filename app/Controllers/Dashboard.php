<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(){
        $role = session()->get('role'); 

        if ($role == 'personnel') {
            return view('dashboard_personnel');
        } else if ($role == 'associate') {
            return view('dashboard_associate');
        } else if ($role == 'god'){
            return view('homepage');
        } else {
            return redirect()->to('login');
        }
    }

}
