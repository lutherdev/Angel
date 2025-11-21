<?php

namespace App\Controllers;

class Borrow extends BaseController
{
    public function view(){
        return view('dashboard_borrowview');
    }

    public function edit(){
        return view('dashboard_borrowedit');
    }
}
