<?php

namespace App\Controllers;

class Reservation extends BaseController{

    public function view($id){
        $reservationModel = model('Reservation_model');

        $data['reservation'] = $reservationModel
        ->select('tblreservations.*, tblequipments.name as equipment_name, tblusers.username')
        ->join('tblequipments', 'tblequipments.id = tblreservations.equipment_id')
        ->join('tblusers', 'tblusers.id = tblreservations.user_id')
        ->find($id);

        return view('dashboard_reservationview', $data);
    }

     public function edit($id){
        $reservationModel = model('Reservation_model');
        $userModel = model('Users_model');
        $equipmentModel = model('Equipments_model');

        $data['reservation'] = $reservationModel
            ->select('tblreservations.*, tblusers.username')
            ->join('tblusers', 'tblusers.id = tblreservations.user_id')
            ->find($id);

        $data['users'] = $userModel->findAll();
        $data['equipments'] = $equipmentModel->findAll();

        return view('dashboard_reservationedit', $data);
    }


    public function update($id) {
        $reservationModel = model('Reservation_model');

        $existing = $reservationModel->find($id);

        $data = [
            'user_id' => $this->request->getPost('user_id') ?: $existing['user_id'],
            'equipment_id' => $this->request->getPost('equipment_id') ?: $existing['equipment_id'],
            'reserved_date' => $this->request->getPost('reserved_date') ?: $existing['reserved_date'],
            'status' => $this->request->getPost('status') ?: $existing['status'],
        ];

        $reservationModel->update($id, $data);

        return redirect()->to('dashboard');
    }
}