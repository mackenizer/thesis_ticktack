<?php

namespace App\Controllers;
use App\Models\ViewProjects;

class SendMail extends BaseController
{
	public function index($id = null)
	{
       
        if($this->request->getMethod() == 'post'){
            $rules = [
             
                'email' => 'required',
                'subject' => 'required',
                'message' => 'required',

               
                
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo $data['validation']->listErrors();
               
            }else{
                if(isset($_POST['send'])){
                    $email = $_POST['email'];
                    $subject = $_POST['subject'];
                    $message = $_POST['message'];
                    $sender = "from: makmakachacoso@gmail.com";


                    $session = session();
                    $session->setFlashdata('success', 'Email successfuly sent!');
                    return redirect()->to('dashboard');
                }
                    
                
            }
           
       }
	}
	
}
