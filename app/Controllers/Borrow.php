<?php

namespace App\Controllers;

class Borrow extends BaseController
{

   public function borrow(){
        $borrowModel = model('Borrow_model');
        $equipmentModel = model('Equipments_model');
        $userModel = model('Users_model');

        $username = $this->request->getPost('username');  // Get username input from form
        $equipment_id = $this->request->getPost('equipment_id');
        $quantity = (int)$this->request->getPost('quantity');
        $borrow_date = $this->request->getPost('borrow_date');
        $status = "Borrowed";

        // Find user by username
        $user = $userModel->where('username', $username)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Username not found.');
        }

        $user_id = $user['id'];

        $equipment = $equipmentModel->find($equipment_id);

        if ($quantity > $equipment['avail_count']) {
            return redirect()->back()->with('error', 'Not enough stock available.');
        }

        $borrowModel->insert([
            'user_id' => $user_id,
            'equipment_id' => $equipment_id,
            'quantity' => $quantity,
            'borrow_date' => $borrow_date,
            'status' => $status,
        ]);

        $equipmentModel->update($equipment_id, [
            'avail_count' => $equipment['avail_count'] - $quantity
        ]);

        $message = "<h2>Hello, ".$user['first_name'].' '. $user['last_name'].",</h2><br>
            YOU BORROWED AN ITEM : ".$equipment['name']." with id ".$equipment_id."<br>
            <br>From ITSO TEAM";
        $email = service('email');
        $email->setFrom('lutherdeanph2@gmail.com', 'noname');
        $email->setTo($user['email']);
        $email->setSubject('BORROW EQUIPMENT');
        $email->setMessage($message);
        if(!$email->send()){
            $session->setFlashData('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('dashboard');
        }

        return redirect()->to('/dashboard')->with('success', 'Borrow successful');
    }



    public function borrowview(){
        $equipmentModel = model('Equipments_model');
        $userModel = model('Users_model');

        $data['equipments'] = $equipmentModel->findAll();
        $data['users'] = $userModel->findAll();

        return view('borrow_view', $data);
    }


    public function view($id){
        $borrowModel = model('Borrow_model');

        $data['borrow'] = $borrowModel
        ->select('tblborrow.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name')
        ->join('tblusers', 'tblusers.id = tblborrow.user_id')
        ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
        ->find($id);

        return view('borrowed_view', $data);
    }

    public function edit($id){
        $borrowModel = model('Borrow_model');
        $userModel = model('Users_model');
        $equipmentModel = model('Equipments_model');

        $data['borrow'] = $borrowModel
        ->select('tblborrow.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name')
        ->join('tblusers', 'tblusers.id = tblborrow.user_id')
        ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
        ->find($id);

        $data['users'] = $userModel->findAll();
        $data['equipments'] = $equipmentModel->findAll();

        return view('borrowed_edit', $data);
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