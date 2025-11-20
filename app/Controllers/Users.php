<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {   
        $usermodel = model('Users_model');

        $data = array(
            'title' => 'TW32 App - View User Record',
            'users' => $usermodel->findAll()
        );
        return view('users_home', $data);
    }

    // public function add() {
    //     return view('users_add');
    // }

    // public function insert() {
    //     $usermodel = model('Users_model');
    //     // Creates the session object
    //     $session = session(); // $session = service('session');

    //     // Creates and loads the Validation library
    //     $validation = service('validation');

    //     $data = array ( //HASH THE PASSWORD
    //         'username' => $this->request->getPost('username'),
    //         'password' => $this->request->getPost('password'),
    //         'confirmpassword' => $this->request->getPost('confirmpassword'),
    //         'fullname' => $this->request->getPost('fullname'),
    //         //'email' => $this->request->getPost('email'),
    //     );

    //     // Runs the validation
    //     if(! $validation->run($data, 'signup')){
    //         // If validation fails, reload the form passing the error messages
    //         $data = array(
    //             'title' => 'TW32 App - Add New User',
    //             // 'errors' => $validation->getErrors()
    //         );
    //         // Set the flash data session item for the errors
    //         $session->setFlashData('errors', $validation->getErrors());
    //         return redirect()->to('users/add');
    //     }

    //     $usermodel->insert($data);
    //     $session->setFlashData('success', 'Adding new user is successful.');
    //     return redirect()->to('users');
    // }

    public function view($id) {
        $usermodel = model('Users_model');

        $data = array(
            'title' => 'TW32 App - View User Record',
            'user' => $usermodel->find($id)
        );

        return view('users_view', $data);
    }

    public function edit($id) { //FOR FORM
        $usermodel = model('Users_model');
        $session = session();

        $data = array(
            'title' => 'TW32 App - View User Record',
            'user' => $usermodel->find($id)
        );

        return view('users_update', $data);
    }

    //ACTUAL UPDATE
    public function update($id) { //validation for inputs and flashdata set
        $usermodel = model('Users_model');
        $session = session();

        $data = array (
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
        );

        $usermodel->update($id, $data);

        return redirect()->to('users');
    }

    public function delete($id) { //modal for sureness
        $usermodel = model('Users_model');
        $session = session();
        $usermodel->delete($id);
        return redirect()->to('users');
    }
}
