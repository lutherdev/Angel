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

        $data['reservation'] = $reservationModel
        ->select('tblreservations.*, tblequipments.name as equipment_name, tblusers.username')
        ->join('tblequipments', 'tblequipments.id = tblreservations.equipment_id')
        ->join('tblusers', 'tblusers.id = tblreservations.user_id')
        ->find($id);

        return view('dashboard_reservationedit', $data);
    }
}