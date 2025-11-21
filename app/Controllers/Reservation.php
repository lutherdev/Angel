<?php

namespace App\Controllers;

class Reservation extends BaseController{

    public function view(){
        return view('dashboard_reservationview');
    }

    public function edit(){
        return view('dashboard_reservationedit');
    }
}