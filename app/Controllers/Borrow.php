<?php

namespace App\Controllers;

class Borrow extends BaseController
{
    public function view($id){
        $borrowModel = model('Borrow_model');

        $data['borrow'] = $borrowModel
        ->select('tblborrow.*, tblequipments.name as equipment_name, tblusers.username')
        ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
        ->join('tblusers', 'tblusers.id = tblborrow.user_id')
        ->find($id);

        return view('dashboard_borrowview', $data);
    }

    public function edit($id){
        $borrowModel = model('Borrow_model');
        $userModel = model('Users_model');
        $equipmentModel = model('Equipments_model');

        $data['borrow'] = $borrowModel
            ->select('tblborrow.*, tblusers.username')
            ->join('tblusers', 'tblusers.id = tblborrow.user_id')
            ->find($id);

        $data['users'] = $userModel->findAll();
        $data['equipments'] = $equipmentModel->findAll();

        return view('dashboard_borrowedit', $data);
    }


    public function update($id) {
        $borrowModel = model('Borrow_model');

        $existing = $borrowModel->find($id);

        $data = [
            'user_id' => $this->request->getPost('user_id') ?: $existing['user_id'],
            'equipment_id' => $this->request->getPost('equipment_id') ?: $existing['equipment_id'],
            'quantity' => $this->request->getPost('quantity') ?: $existing['quantity'],
            'borrow_date' => $this->request->getPost('borrow_date') ?: $existing['borrow_date'],
            'return_date' => $this->request->getPost('return_date') ?: $existing['return_date'],
            'status' => $this->request->getPost('status') ?: $existing['status'],
        ];

        $borrowModel->update($id, $data);

        return redirect()->to('dashboard');
    }

}