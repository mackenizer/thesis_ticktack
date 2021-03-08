<?php namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
	public function index()
	{
        $data = [];

        helper(['form']);

        if ($this->request->getMethod() == 'post'){
            $rules = [
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'password' => 'required|min_length[8]|max_length[255]|validateUser[email,password]',
            ];

            $errors = [
                'password' => [
                    'validateUser' => 'Email or Password doesn\'t match'
                ]
            ];

            if(!$this->validate($rules, $errors)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $user = $model->where('email', $this->request->getVar('email'))
                                ->first();

                $this->setUserSession($user);

                if($user['role'] == 'adviser'){
                    return redirect()->to('admin');
                }elseif($user['role'] == 'student'){
                    return redirect()->to('student');
                }elseif($user['role'] == 'admin'){
                    return redirect()->to('admin');
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

    public function setUserSession($user){
        $data = [
            'userID' => $user['userID'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email' => $user['email'],
            'role' => $user['role'],
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
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'repass' => 'matches[password]',
                'role' => 'required',
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                    'role' => $this->request->getVar('role'),
  
                ];
                $model->save($newData);
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
