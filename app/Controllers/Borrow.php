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

        $data['borrow'] = $borrowModel
        ->select('tblborrow.*, tblequipments.name as equipment_name, tblusers.username')
        ->join('tblequipments', 'tblequipments.id = tblborrow.equipment_id')
        ->join('tblusers', 'tblusers.id = tblborrow.user_id')
        ->find($id);

        return view('dashboard_borrowedit', $data);
    }
}