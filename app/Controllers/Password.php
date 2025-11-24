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
            return redirect()->to('password/forget');
        }
        $token = $this->createResetToken($user['id']);
        $message = "<h2>Hello, ".$user['first_name']. $user['last_name'].",</h2><br>
            PLEASE CLICK THE LINK BELOW FOR RESET PASSWORD. <br>
            -------> <a href=".base_url('password/reset/'.$token).">!!!CLICK THIS!!!</a> <-----
            <br>From LELOUCH";
        $email = service('email');
        $email->setFrom('lutherdeanph2@gmail.com', 'noname');
        $email->setTo($user['email']);
        $email->setSubject('USER ACCOUNT RESET');
        $email->setMessage($message);
        if(!$email->send()){
            
            $session->setFlashData('error', $email->printDebugger(['headers', 'subject', 'body']));
            return redirect()->to('password/forget');
        }

        $session->setFlashData('success', 'EMAIL SENT!');
        return redirect()->to('password/forget');
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
        if (!$tokenData) {
            $session->setFlashData('error', 'Invalid or expired token.');
            return redirect()->to('/dashboard');
        }

        $tokenTime = strtotime($tokenData['created_at']);
        if (time() - $tokenTime > 3600) {  // 1 hour
            $session->setFlashData('error', 'Token expired.');
            return redirect()->to('/dashboard');
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
        $tokenModel->delete($tokenData['id']);
        $session->setFlashData('success', 'password updated!');
        return redirect()->to('password/forget');

    }
    public function changeview(){
        $session = session();
        $checkses = $session->get('isLoggedIn');
        if (!$checkses) {
        return redirect()->to('/login')->with('error', 'Please login first.');
    }
        return view('password_change');
    }

    public function change(){
    $session = session();
    $userModel = model('Users_model');

    $userId = $session->get('user_id');
    $checkses = $session->get('isLoggedIn');
    if (!$checkses) {
        return redirect()->to('/login')->with('error', 'Please login first.');
    }

    $currentPassword = $this->request->getPost('current_password');
    $newPassword     = $this->request->getPost('new_password');
    $confirmPassword = $this->request->getPost('confirm_password');

    // fetch user from DB
    $user = $userModel->find($userId);

    if (!$user) {
        return redirect()->back()->with('error', 'Loggedin User not found.');
    }
    // check current password
    if (!password_verify($currentPassword, $user['password'])) {
        return redirect()->back()->with('error', 'Current password is incorrect.');
    }

    // check new password confirmation
    if ($newPassword !== $confirmPassword) {
        return redirect()->back()->with('error', 'New passwords do not match.');
    }

    // validate new password 
    

    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
    $userModel->update($userId, ['password' => $hashedPassword]);

    return redirect()->back()->with('success', 'Password changed successfully!');
    return redirect()->to('password/change')->with('success', 'Password changed!');
}


    


}