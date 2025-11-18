<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index(): string
    {   
        return view('login');
    }

    public function login(){
        $usermodel = model('Users_model');
        $session = session();
        

        $user = $usermodel->where('username', $this->request->getPost('username'))->first();
        $password = $this->request->getPost('password');
        $username = $this->request->getPost('username');
            
        $session->set('role', $user['role']);
        
        //password compare to database
        if($password == $user['password']){
            return redirect()->to('dashboard');
        }
        return redirect()->to('dashboard');
    }


    public function register(){
        //IMPLEMENT REGISTER AND FORM VALIDATION FOR IT!!
        //this is not the same as ADD USER ng personnel!
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('dashboard');
    }
}
