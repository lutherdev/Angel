<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(){
        $role = session()->get('role'); 
        $usermodel = model('Users_model');
        $itemmodel = model('Equipments_model');

        $data = array(
            'title' => 'TW32 App - View User Record',
            'users' => $usermodel->findAll(),
            'items' => $itemmodel->findAll()
        );

        if ($role == 'Personnel') {
            return view('dashboard_personnel', $data);
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
