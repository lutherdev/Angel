<?php

namespace App\Controllers;

class Password extends BaseController{

    public function createResetToken($userId){
        $tokenModel = model('User_Token_model');

        // prepare data
        $data = [
            'user_id'    => $userId,
            'token'      => bin2hex(random_bytes(16)),
            'created_at' => date('Y-m-d H:i:s'),
            'expires_at' => date('Y-m-d H:i:s', strtotime('+1 hour'))
        ];

        $tokenModel->insert($data);

        return $data['token'];
    }

    public function forgetview(){
        return view('password_forget');

    }

    public function forget(){
        
        $usermodel = model('Users_model');
        $session = session();
        //implement email send some creation of token stuff here
        $inpemail = $this->request->getpost('email');
        //dd($inpemail);
        $user = $usermodel
        ->select('email, id, first_name, last_name')
        ->where('email', $inpemail)
        ->first();

        if (!$user){
            $session->setFlashData('error', 'EMAIL/USER DOESNT EXIST');
            return redirect()->to('/forget');
        }
        $token = $this->createResetToken($user['id']);
        $message = "<h2>Hello, ".$user['first_name']. $user['last_name'].",</h2><br>
            TANGINA MO!!!!!. <a href=".base_url('password/reset/'.$token).">Click mo to bilis!</a><br>From LELOUCH";
        $email = service('email');
        $email->setFrom('lutherdeanph2@gmail.com', 'noname');
        $email->setTo($user['email']);
        $email->setSubject('USER ACCOUNT RESET');
        $email->setMessage($message);
        if(!$email->send()){
            
            $session->setFlashData('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('forget');
        }

        $session->setFlashData('success', 'EMAIL SENT!');
        return redirect()->to('forget');
    }

    public function resetview($token){
        $session = session();

        $tokenModel = model('User_Token_model');
        //implement getting token in url and verifying the token

        //and process the user inputs after
        $tokenModel->where('expires_at <', date('Y-m-d H:i:s'))->delete();

        // now validate the current token
        $tokenData = $tokenModel->where('token', $token)->first();
        if (!$tokenData){
            $session->setFlashData('error', 'token doesnt exist!');
            return redirect()->to('/forget');
        }

        if($tokenData['used'] == 1){
            $session->setFlashData('error', 'token already used!');
            return redirect()->to('/forget');
        }

        $tokenModel->update($tokenData['id'], ['used' => 1]);

        $session->setFlashData('success', 'token used!');
        return view('password_reset', ['token' => $token]);
    }

    public function reset($token){
        $session = session();

        $tokenModel = model('User_Token_model');
        $usermodel = model('Users_model');

        $tokenData = $tokenModel->where('token', $token)->first();

        $password = $this->request->getPost('new_password');
        $confirmpassword = $this->request->getPost('confirm_password');
        if (!($password == $confirmpassword)){
            $session->setFlashData('error', 'password dont match!');
            return redirect()->to('password/reset/'.$token);
        }
        //dd($password);
        $usermodel->update($tokenData['user_id'], ['password' => password_hash($password, PASSWORD_DEFAULT)]);
        //$usermodel->update($tokenData['user_id'], ['password' => $password]);
        $session->setFlashData('success', 'password updated!');
        return redirect()->to('forget');

    }
    public function changeview(){
        return view('password_change');
    }

    public function change(){
        //implement hash, update, regex,  
    }

    


}