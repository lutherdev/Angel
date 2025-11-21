<?php

namespace App\Controllers;

class Password extends BaseController{

    public function forgetview(){
        return view('password_forget');
    }

    public function forget(){
        //implement email send some creation of token stuff here
    }

    public function resetview(){
        return view('password_reset');
    }

    public function reset(){
        //implement getting token in url and verifying the token
        //and process the user inputs after
    }
    public function changeview(){
        return view('password_change');
    }

    public function change(){
        //implement hash, update, regex,  
    }
}