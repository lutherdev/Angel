<?php

namespace App\Controllers;

class Reservation extends BaseController{

    public function reserveview(){
        $session = session();
        $checkses = $session->get('isLoggedIn');
        if (!$checkses) {
        return redirect()->to('/login')->with('error', 'Please login first.');
        }
        
        if (!($session->get('role') == 'Associate')) {
        return redirect()->to('/dashboard')->with('error', 'Only Associates can Reserve.');
        }
        return view('reserve_view');
    }

    public function reserve(){
        $session = session();
        $reservationModel = model("Reservation_model");
        $equipmentModel = model("Equipments_model");
        $userModel = model('Users_model');
        

        // Get POST inputs
        $userId = $session->get('user_id'); // If this is user_id or username, adjust accordingly
        $equipmentId = $this->request->getPost('id');
        $reservedDate = $this->request->getPost('reserved_date');

        
        // Validate required inputs
        if (!$userId || !$equipmentId || !$reservedDate) {
            return redirect()->back()->with('error', 'Please fill in all fields.');
        }

        // Check if equipment exists
        $equipment = $equipmentModel->find($equipmentId);
        if (!$equipment) {
            return redirect()->back()->with('error', 'Equipment not found.');
        }

        // Check if quantity is available
        if ($equipment['quantity'] <= 0) {
            return redirect()->back()->with('error', 'This equipment is currently unavailable.');
        }

        // Insert into reservations table
        $reservationModel->insert([
            'user_id' => $userId,
            'equipment_id' => $equipmentId,
            'reserved_date' => $reservedDate,
            'status' => 'RESERVED'
        ]);
        $user = $userModel->find($userId);

        $message = "<h2>Hello, ".$user['first_name'].' '. $user['last_name'].",</h2><br>
            YOU RESERVED AN ITEM : ".$equipment['name']." with id ".$equipment['id'].". Please Wait for ITSO to Confirm your Reservation. <br>
            <br>From ITSO TEAM";
        $email = service('email');
        $email->setFrom('lutherdeanph2@gmail.com', 'noname');
        $email->setTo($user['email']);
        $email->setSubject('RESERVE EQUIPMENT');
        $email->setMessage($message);
        if(!$email->send()){
            $session->setFlashData('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('dashboard');
        }

        return redirect()->back()->with('success', 'Equipment successfully reserved.');

        
    }

    public function view($id){
        $reservationModel = model('Reservation_model');

        $data['reservation'] = $reservationModel
        ->select('tblreservations.*, tblequipments.name as equipment_name, tblusers.username')
        ->join('tblequipments', 'tblequipments.id = tblreservations.equipment_id')
        ->join('tblusers', 'tblusers.id = tblreservations.user_id')
        ->find($id);

        return view('reservation_view', $data);
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

        return view('reservation_edit', $data);
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

    public function release($id){
    $reservationModel = model('Reservation_model');
    $equipmentModel = model('Equipments_model');


    // check reservation exists
    $reservation = $reservationModel->find($id);
    if (!$reservation) {
        return redirect()->back()->with('error', 'Reservation not found.');
        return redirect()->to('equipments')->with('success', 'Equipment status updated successfully.');
    }

    if ($reservation['status'] == 'DONE'){
            return redirect()->back()->with('error', 'This reservation is already done.');
        }

    if ($reservation['status'] == 'RELEASED'){
        return redirect()->back()->with('error', 'Equipment is already released.');
    }

    //implement here minus 1 sa equipment database
    $equipment = $equipmentModel->find($reservation['equipment_id']);
    if (!$equipment) {
        return redirect()->back()->with('error', 'Item not found.');
    }

    if (($equipment['quantity']-1) < 0) {
        return redirect()->back()->with('error', 'Not enough stock to release.');
    }
    
    $equipmentModel->update($reservation['equipment_id'], [
        'quantity' => ($equipment['quantity']-1),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);

    $reservationModel->update($id, [
        'status' => 'RELEASED',
        'updated_at' => date('Y-m-d H:i:s'),
    ]);


    return redirect()->back()->with('success', 'Reserved item is released.');
    //return redirect()->to('equipments')->with('success', 'Equipment status updated successfully.');
}

    public function done($id){
        $reservationModel = model('Reservation_model');
        $equipmentModel = model('Equipments_model');
        // check reservation exists
        $reservation = $reservationModel->find($id);
        if (!$reservation) {
            return redirect()->back()->with('error', 'Reservation not found.');
            //return redirect()->to('equipments')->with('success', 'Equipment status updated successfully.');
        }

        //implement here plus 1 sa equipment database

        if ($reservation['status'] == 'DONE'){
            return redirect()->back()->with('error', 'Equipment is already returned.');
        }

        //implement here minus 1 sa equipment database
        $equipment = $equipmentModel->find($reservation['equipment_id']);
        if (!$equipment) {
            return redirect()->back()->with('error', 'Item not found.');
        }
        
        $equipmentModel->update($reservation['equipment_id'], [
            'quantity' => ($equipment['quantity']+1),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $reservationModel->update($id, [
            'status' => 'DONE',
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->back()->with('success', 'Reserved item is returned.');
    }

}