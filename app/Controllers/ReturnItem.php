<?php

namespace App\Controllers;

class ReturnItem extends BaseController
{
    public function index(): string
    {   
        return view('homepage');
    }

    public function returnview(){
        return view('return_view');
    }

    public function returnItem(){
        $borrowModel = model('Borrow_model');
        $equipmentModel = model('Equipments_model');
        $userModel = model('Users_model');

        $equipment_id = $this->request->getPost('equipment_id');
        $username = $this->request->getPost('username');

        $user = $userModel->where('username', $username)->first();

        if(!$user){
            return redirect()->back()->with('error', 'Username not found');
        }

        $borrowRecord = $borrowModel
            ->where('user_id', $user['id'])
            ->where('equipment_id', $equipment_id)
            ->first();

        if(!$borrowRecord){
            return redirect()->back()->with('error', 'No borrow record found');
        }

        $equipment = $equipmentModel->find($equipment_id);
        if(!$equipment){
            return redirect()->back()->with('error', 'Equipment not found');
        }

        $newAvailCount = $equipment['avail_count'] + $borrowRecord['quantity'];
        $equipmentModel->update($equipment_id, ['avail_count'=>$newAvailCount]);
        $borrowModel->update($borrowRecord['borrow_id'], ['status' => 'Returned']);

        return redirect()->to('/dashboard')->with('success', 'Return successful');
    }

}
