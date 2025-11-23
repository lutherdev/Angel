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
        //set other session details
        $user = $usermodel->where('username', $this->request->getPost('username'))->first();  
        if (!$user){
            return redirect()->to('dashboard')->with('error', 'Invalid username');
        }
        $password = $this->request->getPost('password'); 
        $storedHash = $user['password'];               // hash from DB

        if (password_verify($password, $storedHash)) {
            //SET OTHER ROLES
            $session->set('role', $user['role']);
            $session->set('user_id', $user['id']);
            $session->set('username', $user['username']);
            $session->set('name', $user['first_name']." ".$user['last_name']);
            $session->set('isLoggedIn', true);

            return redirect()->to('dashboard')->with('success', 'HELLO '.$user['first_name'] .', SUCCESS LOGIN');
        }
        return redirect()->to('dashboard')->with('error', 'Invalid password.');
    }

    public function regview(){
        return view('register');
    }

    public function register(){
        $usermodel = model('Users_model');
        $session = session();
        //IMPLEMENT REGISTER AND FORM VALIDATION FOR IT!!
        //this is not the same as ADD USER ng personnel!
        $validation = service('validation');

        $dataToVal = array (
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'), PASSWORD_DEFAULT,
            'email' => $this->request->getPost('email'),
            'firstname' => $this->request->getPost('firstname'),
            'middlename' => $this->request->getPost('middlename'),
            'lastname' => $this->request->getPost('lastname'),
            'role' => $this->request->getPost('role'),
            'status' => "Active"
        );

        $data = array (
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => strtoupper($this->request->getPost('email')),
            'first_name' => strtoupper($this->request->getPost('firstname')),
            'middle_name' => strtoupper($this->request->getPost('middlename')),
            'last_name' => strtoupper($this->request->getPost('lastname')),
            'role' => strtoupper($this->request->getPost('role')),
            'status' => "Active"
        );

        $existuser = $usermodel->where('username', $data['username'])->first();
        if ($existuser){ //if the user exists and if that user isnt equal to the one u r editing
            $session->setFlashData('error', 'username already exists');
            return redirect()->to('register');
        }

        $existemail = $usermodel->where('email', $data['email'])->first();
        if ($existemail){ //if the user exists and if that user isnt equal to the one u r editing
            $session->setFlashData('error', 'email already used');
            return redirect()->to('register');
        }

        if(!$validation->run($dataToVal, 'signup')){
            $errors = implode('<br>', $validation->getErrors());
            $session->setFlashData('error', $errors);
            return redirect()->to('register');
        }
        $usermodel->insert($data);
        $session->setFlashData('success', 'Register Success.');
        return redirect()->to('dashboard');
    }

    public function logout(){
        $session = session();
        $session->destroy();
        return redirect()->to('dashboard');
    }
}
