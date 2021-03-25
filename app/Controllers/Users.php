<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;

class Users extends BaseController
{
	public function index()
	{
        $data = [];

        helper(['form']);

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]',
            ];



            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $model = new AdviserModel();
                $model1 = new StudentModel();

                $role = $this->request->getVar('role');



                if($role == 'adviser'){

                    
                    $user = $model->where('email', $this->request->getVar('email'))
                                ->first();
                    // print_r($user);
                    if(!$user){
                        $session = session();
                        $session->setFlashdata('error', 'User does not exist');
                    }
                    else{
                        if(!password_verify($this->request->getVar('password'), $user['password'])){
                            $session = session();
                            $session->setFlashdata('error', 'Invalid Credentials');
                        }
                            
                        
                        else{
                            $this->setAdviserSession($user);
                            return redirect()->to('adviser');
                        }
                        
                    }
                }elseif($role == 'student'){
                    $user = $model1->where('email', $this->request->getVar('email'))
                                ->first();
                    
                    if(!$user){
                        $session = session();
                        $session->setFlashdata('error', 'User does not exist');
                    }
                    else{
                        if(!password_verify($this->request->getVar('password'), $user['password'])){
                            $session = session();
                            $session->setFlashdata('error', 'Invalid Credentials');
                        }
                            
                        
                        else{
                            $this->setStudentSession($user);
                            if($user['leader'] == 'yes'){
                                return redirect()->to('leader');
                            }elseif($user['leader'] == 'no'){
                                return redirect()->to('student');
                            }
                            
                        }
                        
                    }
                }
                

                

                

                

                
                    
               
            //   print_r($user);
            //   echo $user['role'];

            
                // $session->setFlashdata('success', 'Successful Registration');
               
            }
        }
        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');

	}

    public function setStudentSession($user){
        $data = [
            'studentID' => $user['studentID'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'projectID' => $user['projectID'],

            'isLoggedIn' => true, 
        ];

        session()->set($data);
        return true;


    }

    public function setAdviserSession($user){
        $data = [
            'adviserID' => $user['adviserID'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'isLoggedIn' => true, 
        ];

        session()->set($data);
        return true;


    }

    public function profile(){

        $data = [];

        helper(['form']);


        echo view('templates/header1');
        echo view('profile');
        echo view('templates/footer');


    }

    public function logout(){

        session()->destroy();
        return redirect()->to('/');
        
    }

    public function register(){

        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[students.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'repass' => 'matches[password]',
                'role' => 'required',
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{  
                $model = new AdviserModel();
                $model1 = new StudentModel();


                $role = $this->request->getVar('role');

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    
  
                ];

                if($role == 'adviser'){
                     $model->save($newData);
                }elseif($role == 'student'){
                    $model1->save($newData);
                }
                
                $session = session();
                $session->setFlashdata('success', 'Successfuly Registered!');
                return redirect()->to('/');
            }
        }


        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');

    }
}
