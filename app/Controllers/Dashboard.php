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
            if (session()->getFlashdata('error')) :
            return redirect()->to('login')->with('error', session()->getFlashdata('error'));
            elseif (session()->getFlashdata('success')) :
            return redirect()->to('login')->with('success', session()->getFlashdata('success'));
            else : return redirect()->to('login');
            endif;            
        }
    }
}
