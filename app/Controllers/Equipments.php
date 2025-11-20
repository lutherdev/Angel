<?php

namespace App\Controllers;

class Equipments extends BaseController
{
    public function index(): string
    {   
        $eqpmodel = model('Equipments_model');
        $data = array(
            'title' => 'TW32 App - View User Record',
            'equipments' => $eqpmodel->findAll()
        );
        return view('equipments_home', $data);
    }

    public function add() {
        $eqpmodel = model('Equipments_model');
        $session = session();

        $data = array(
            'title' => 'TW32 App - Add User Record',
            'equipments' => $eqpmodel->findAll()
        );

        return view('equipments_add', $data);
    }

    public function insert() {
        $eqpmodel = model('Equipments_model');
        // Creates the session object
        $session = session(); // $session = service('session');

        // Creates and loads the Validation library
        $validation = service('validation');

        $data = array (
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
            'avail_count' => $this->request->getPost('avail_count'),
            'status' => $this->request->getPost('status'),
            'created_at' => $this->request->getPost('created_at'),
            'updated_at' => $this->request->getPost('updated_at')
        );

        // Runs the validation
        if(! $validation->run($data, 'eqpvalid')){
            // If validation fails, reload the form passing the error messages
            $data = array(
                'title' => 'TW32 App - Add New User',
                // 'errors' => $validation->getErrors()
            );
            // Set the flash data session item for the errors
            $session->setFlashData('errors', $validation->getErrors());
            return redirect()->to('equipments/add');
        }

        $eqpmodel->insert($data);
        $session->setFlashData('success', 'Adding new equipment is successful.');
        return redirect()->to('equipments');
    }

    public function view($id) {
        $eqpmodel = model('Equipments_model');

        $data = array(
            'title' => 'TW32 App - View User Record',
            'equipments' => $eqpmodel->findAll()
        );

        return view('equipments_view', $data);
    }

    public function edit($id) {
        $eqpmodel = model('Equipments_model');
        $session = session();

        $data = array(
            'title' => 'TW32 App - Edit User Record',
            'equipments' => $eqpmodel->findAll()
        );

        return view('equipments_update', $data);
    }

    public function update($id) { //validation for inputs and flashdata set
        $eqpmodel = model('Equipments_model');
        $session = session();

        $data = array (
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
            'avail_count' => $this->request->getPost('avail_count'),
            'status' => $this->request->getPost('status'),
            'updated_at' => $this->request->getPost('updated_at')
        );

        $eqpmodel->update($id, $data);

        return redirect()->to('equipments');
    }

    public function delete($id) { //modal for sureness
        $eqpmodel = model('Equipments_model');
        $session = session();
        $eqpmodel->delete($id);
        return redirect()->to('equipments');
    }
}
