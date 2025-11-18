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
        //TODO: check if username exist first.
        $password = $this->request->getPost('password');
        $username = $this->request->getPost('username');
            
        $session->set('role', $user['role']);
        
        //TODO: add a redirect after checking password, username
        //password compare to database
        //TODO: Implement HASH PASSWORD!!
        if($password == $user['password']){
            return redirect()->to('dashboard');
        }
        return redirect()->to('dashboard');
    }


    public function register(){
        $usermodel = model('Users_model');
        //IMPLEMENT REGISTER AND FORM VALIDATION FOR IT!!
        //this is not the same as ADD USER ng personnel!
        $validation = service('validation');
        //TODO: IMPLEMENT HASH PASSWORD BEFORE INSERTING
        $data = array (
            'username' = $this->request->getPost('username'),
            'fullname' = $this->request->getPost('fullname'),
            'password' = $this->request->getPost('password');
        );
        if($validation->run($data, 'signup')){
            $session->setFlashData('errors', $validation->getErrors());
            return redirect()->to('users/add');
        }
        $usermodel->insert($data);
        $session->setFlashData('success', 'Adding new user is successful.');
        return redirect()->to('');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('dashboard');
    }
}
