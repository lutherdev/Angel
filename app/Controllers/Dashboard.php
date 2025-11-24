<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index(){
        $role = session()->get('role'); 
        $usermodel = model('Users_model');
        $itemmodel = model('Equipments_model');
        $reservationmodel = model('Reservation_model');
        $borrowmodel = model('Borrow_model');
        $userId = session()->get('user_id');
        $data = array(
            'title' => 'TW32 App - View User Record',
            'users' => $usermodel->findAll(),
            'equipments' => $itemmodel->findAll(),
            'title' => 'TW32 App - View User Record',
            'reservations' => $reservationmodel
            ->select('tblreservations.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name as equipment_name')
            ->join('tblusers', 'tblusers.id = tblreservations.user_id')
            ->join('tblequipments', 'tblequipments.id = tblreservations.equipment_id')
            ->findAll(),

            'borrowers' => $borrowmodel
            ->select('tblborrow.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name as equipment_name')
            ->join('tblusers', 'tblusers.id = tblborrow.user_id')
            ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
            ->findAll(),
        );

        $data2 = array(
            'title' => 'TW32 App - View User Record',
            'reservations' => $reservationmodel
            ->select('tblreservations.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name as equipment_name')
            ->join('tblusers', 'tblusers.id = tblreservations.user_id')
            ->join('tblequipments', 'tblequipments.id = tblreservations.equipment_id')
            ->where('tblreservations.user_id', $userId)
            ->findAll(),

            'borrowers' => $borrowmodel
            ->select('tblborrow.*, tblusers.username, tblusers.first_name, tblusers.last_name, tblequipments.name as equipment_name')
            ->join('tblusers', 'tblusers.id = tblborrow.user_id')
            ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
            ->where('tblborrow.user_id', $userId)
            ->findAll(),
        );

        if ($role == 'Personnel') {
            return view('dashboard_personnel', $data);
        } else if ($role == 'Associate') {
            return view('dashboard_associate', $data2);
        } else if ($role == 'God'){
            return view('homepage');
        } else {
            if (session()->getFlashdata('error')) :
            return redirect()->to('login')->with('error', session()->getFlashdata('error'));
            elseif (session()->getFlashdata('success')) :
            return redirect()->to('login')->with('success', session()->getFlashdata('success'));
            else : return redirect()->to('login');
            endif;            
        }
    }
}
