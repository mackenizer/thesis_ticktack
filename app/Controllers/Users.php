<?php namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;
use App\Models\MessageModel;

class Users extends BaseController
{
	// public function index()
	// {
    //     $data = [];

    //     helper(['form']);

    //     if ($this->request->getMethod() == 'post'){
    //         $rules = [
    //             'email' => 'required|min_length[6]|max_length[50]|valid_email',
    //             'password' => 'required|min_length[8]|max_length[255]',
    //         ];



    //         if(!$this->validate($rules)){
    //             $data['validation'] = $this->validator;
    //         }else{
    //             $model = new AdviserModel();
    //             $model1 = new StudentModel();
                

    //             $role = $this->request->getVar('role');



    //             if($role == 'adviser'){

                    
    //                 $user = $model->where('email', $this->request->getVar('email'))
    //                             ->first();
    //                 // print_r($user);
    //                 if(!$user){
    //                     $session = session();
    //                     $session->setFlashdata('error', 'User does not exist');
    //                 }
    //                 else{
    //                     if(!password_verify($this->request->getVar('password'), $user['password'])){
    //                         $session = session();
    //                         $session->setFlashdata('error', 'Invalid Credentials');
    //                     }
                            
                        
    //                     else{
    //                         $this->setAdviserSession($user);
    //                         return redirect()->to('adviser');
    //                     }
                        
    //                 }
    //             }elseif($role == 'student'){
    //                 $user = $model1->where('email', $this->request->getVar('email'))
    //                             ->first();
                    
    //                 if(!$user){
    //                     $session = session();
    //                     $session->setFlashdata('error', 'User does not exist');
    //                 }
    //                 else{
    //                     if(!password_verify($this->request->getVar('password'), $user['password'])){
    //                         $session = session();
    //                         $session->setFlashdata('error', 'Invalid Credentials');
    //                     }
                            
                        
    //                     else{
                            
    //                         $this->setStudentSession($user);
    //                         if($user['leader'] == 'yes'){
    //                             return redirect()->to('leader');
    //                         }elseif($user['leader'] == 'no'){
    //                             return redirect()->to('student');
    //                         }
                            
    //                     }
                        
    //                 }
    //             }
                

                

                

                

                
                    
               
    //         //   print_r($user);
    //         //   echo $user['role'];

            
    //             // $session->setFlashdata('success', 'Successful Registration');
               
    //         }
    //     }
    //     echo view('templates/header', $data);
    //     echo view('login');
    //     echo view('templates/footer');

	// }

    // public function setStudentSession($user){

    //     $messages = new MessageModel();
    //     $datas = $messages->where('incoming_msg_id',$user['studentID'])
    //         ->first();
    //     $datas = $messages->where('outgoing_msg_id',$user['studentID'])
    //         ->first();
    //     $data = [
    //         'studentID' => $user['studentID'],
    //         'firstname' => $user['firstname'],
    //         'lastname' => $user['lastname'],
    //         'email' => $user['email'],
    //         'projectID' => $user['projectID'],
    //         'status' => $user['status'],
    //         'pic' => $user['pic'],
    //         // 'incoming_msg_id' => $datas['incoming_msg_id'],
    //         // 'outgoing' => $datas['outgoing_msg_id'],
           
    //         'isLoggedIn' => true, 
    //     ];

    //     session()->set($data);
    //     return true;


    // }

    // public function setAdviserSession($user){
    //     $data = [
    //         'adviserID' => $user['adviserID'],
    //         'firstname' => $user['firstname'],
    //         'lastname' => $user['lastname'],
    //         'email' => $user['email'],
    //         'status_a' => $user['status_a'],
    //         'pic_a' => $user['pic_a'],
    //         'isLoggedIn' => true, 
    //     ];

    //     session()->set($data);
    //     return true;


    // }

    // public function profile(){

    //     $data = [];

    //     helper(['form']);


    //     echo view('templates/header1');
    //     echo view('profile');
    //     echo view('templates/footer');


    // }

    // public function logout(){

    //     // $model = new AdviserModel();
    //     // $model1 = new StudentModel();


    //     // $user['status'] == 'Offline';
    //     session()->destroy();

    //     return redirect()->to('/');
        
    // }

    // public function register(){

    //     $data = [];
    //     helper(['form']);

    //     if ($this->request->getMethod() == 'post'){
    //         $rules = [
    //             'firstname' => 'required|min_length[3]|max_length[20]',
    //             'lastname' => 'required|min_length[3]|max_length[20]',
    //             'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[students.email]',
    //             'password' => 'required|min_length[8]|max_length[255]',
    //             'repass' => 'matches[password]',
    //             'role' => 'required',
                
    //         ];

    //         if(!$this->validate($rules)){
    //             $data['validation'] = $this->validator;
    //         }else{  
    //             $model = new AdviserModel();
    //             $model1 = new StudentModel();


    //             $role = $this->request->getVar('role');

    //             $newData = [
    //                 'firstname' => $this->request->getVar('firstname'),
    //                 'lastname' => $this->request->getVar('lastname'),
    //                 'email' => $this->request->getVar('email'),
    //                 'password' => $this->request->getVar('password'),
    //                 'status' => 'Active now',
                    
  
    //             ];

    //             if($role == 'adviser'){
    //                  $model->save($newData);
    //             }elseif($role == 'student'){
    //                 $model1->save($newData);
    //             }
                
    //             $session = session();
    //             $session->setFlashdata('success', 'Successfuly Registered!');
    //             return redirect()->to('/');
    //         }
    //     }


    //     echo view('templates/header', $data);
    //     echo view('register');
    //     echo view('templates/footer');

    // }
    public function index()
	{
		$data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[email, password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Username or password does not exist!'
                ]
                ];


            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
                // print_r($data);
                // exit();
            }else{
             
                $model = new UserModel();
           
                

                $user = $model->where('email', $this->request->getVar('email'))
                    ->first();

            
            
                if($user['role'] == 'adviser'){
                   
                    $this->setAdviserSession($user);
                    return redirect()->to('dashboard');
                   
                }elseif($user['role'] == 'student'){
                    $this->setStudentSession($user);
                    return redirect()->to('dashboard');
                }
                
               
                    
            }
        }



        echo view('templates/header', $data);
        echo view('login');
        echo view('templates/footer');
	}

    public function setStudentSession($user){
        $model = new StudentModel();

        $display = $model->where('userID', $user['userID'])
        ->first();

      
   
        $data = [
            'userID' => $user['userID'],
            'studentID' => $display['studentID'],
            'email' => $user['email'],
            'firstname' => $display['firstname'],
            'lastname' => $display['lastname'],
            // 'password' => $users['password'],
            'role' => $user['role'],
         
           
            'isLoggedIn' => true, 
        ];
        // print_r($data);
        // exit();

        if($user['role'] == $data['role']){
            $data['userID'] = $display['userID'];
        }

        session()->set($data);
        return true;


    }

    public function setAdviserSession($user){
        $model = new AdviserModel();

        $display = $model->where('userID', $user['userID'])
        ->first();


        $data = [
            'userID' => $user['userID'],
            'adviserID' => $display['adviserID'],
            'email' => $user['email'],
            'firstname' => $display['firstname'],
            'lastname' => $display['lastname'],
            // 'password' => $users['password'],
            'role' => $user['role'],
     
            'isLoggedIn' => true, 
        ];

        if($user['role'] == $data['role']){
            $data['userID'] = $display['userID'];
        }

        session()->set($data);
        return true;


    }

    public function logout(){

            // $model = new AdviserModel();
            // $model1 = new StudentModel();
    
    
            // $user['status'] == 'Offline';
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
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[5]|max_length[255]',
                'repass' => 'matches[password]',
                'role' => 'required',
                
            ];

           
            if(!$this->validate($rules)){

                $data['validation'] = $this->validator;
               
            }else{  
                $model = new AdviserModel();
                $model1 = new StudentModel();
                $model2 = new UserModel();


                $role = $this->request->getVar('role');

                $userData = [
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    // 'email' => $this->request->getVar('email'),
                    'role' => $this->request->getVar('role'),


                ];

              
                $model2->save($userData);
                $userID = $model2->getInsertID();


                $newData = [
                    'userID' => $userID,
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                  
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
