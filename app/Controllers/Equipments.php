<?php

namespace App\Controllers;

class Equipments extends BaseController
{
    public function index(): string
    {   
        return view('equipments_home');
    }

    public function add() {
        // $session = session();
        // $data = array(
        //     'title' => 'TW32 App - Add New User',
        // );

        return view('equipments_add');
    }

    public function insert() {
        $usermodel = model('Equipments_model');
        // Creates the session object
        $session = session(); // $session = service('session');

        // Creates and loads the Validation library
        $validation = service('validation');

        $data = array (
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'confirmpassword' => $this->request->getPost('confirmpassword'),
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
        );

        // Runs the validation
        if(! $validation->run($data, 'signup')){
            // If validation fails, reload the form passing the error messages
            $data = array(
                'title' => 'TW32 App - Add New User',
                // 'errors' => $validation->getErrors()
            );
            // Set the flash data session item for the errors
            $session->setFlashData('errors', $validation->getErrors());
            return redirect()->to('equipments/add');
        }

        $usermodel->insert($data);
        $session->setFlashData('success', 'Adding new user is successful.');
        return redirect()->to('equipments');
    }

    public function view($id) {
        $usermodel = model('Equipments_model');

        $data = array(
            'title' => 'TW32 App - View User Record',
            'user' => $usermodel->find($id)
        );

        return view('equipments_view', $data);
    }

    public function edit($id) {
        $usermodel = model('Equipments_model');
        $session = session();

        $data = array(
            'title' => 'TW32 App - View User Record',
            'user' => $usermodel->find($id)
        );

        return view('equipments_update', $data);
    }

    public function update($id) { //validation for inputs and flashdata set
        $usermodel = model('Equipments_model');
        $session = session();

        $data = array (
            'username' => $this->request->getPost('username'),
            'password' => $this->request->getPost('password'),
            'fullname' => $this->request->getPost('fullname'),
            'email' => $this->request->getPost('email'),
        );

        $usermodel->update($id, $data);

        return redirect()->to('equipments');
    }

    public function delete($id) { //modal for sureness
        $usermodel = model('Equipments_model');
        $session = session();
        $usermodel->delete($id);
        return redirect()->to('equipments');
    }
}
