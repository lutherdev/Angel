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
        return view('equipments_add');
    }

    public function insert() {
        $eqpmodel = model('Equipments_model');
        $session = session();
        $validation = service('validation');

        $data = array (
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'quantity' => $this->request->getPost('quantity'),
            'avail_count' => $this->request->getPost('quantity'),
            'status' => 'available',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );

        if(! $validation->run($data, 'eqpvalid')){
            $errors = implode('<br>', $validation->getErrors());
            $session->setFlashData('errors', $errors);
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
            'equipment' => $eqpmodel->find($id)
        );

        return view('equipments_view', $data);
    }

    public function edit($id) {
        $eqpmodel = model('Equipments_model');
        $session = session();

        $data = array(
            'title' => 'TW32 App - Edit Equipment Record',
            'equipment' => $eqpmodel->find($id)
        );

        return view('equipments_update', $data);
    }

    public function update($id) {
        $eqpmodel = model('Equipments_model');
        $session = session();

        $data = array (
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'category' => $this->request->getPost('category'),
            'quantity' => $this->request->getPost('quantity'),
            'avail_count' => $this->request->getPost('avail_count'),
            'status' => $this->request->getPost('status'),
            'updated_at' => date('Y-m-d H:i:s')
        );

        $eqpmodel->update($id, $data);
        $session->setFlashData('success', 'Equipment updated successfully.');
        return redirect()->to('equipments');
    }

    public function delete($id) { //modal for sureness
        $eqpmodel = model('Equipments_model');
        $session = session();
        $eqpmodel->delete($id);
        return redirect()->to('equipments');
    }


    public function borrowview(){
        return view('equipments_borrow');
    }

    public function returnview(){
        return view("equipments_return");
    }

    public function reserveview(){
        return view('equipments_reserve');
    }
}
