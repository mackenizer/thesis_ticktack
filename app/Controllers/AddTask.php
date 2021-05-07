<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;
use App\Models\UserModel;


class AddTask extends BaseController
{
	public function index($id = null)
	{
        if($this->request->getMethod() == 'post'){
                $rules = [
                    'task' => 'required',
                    'description' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'members' => 'required',
                    
                ];
    
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    echo 'heheheeh';
      
                }else{
                    $task = new TaskModel();

                    
                 
       
                    $newData = [
                        'task' => $this->request->getVar('task'),
                        'description' => $this->request->getVar('description'),
                        'project_id' => $this->request->getVar('id'),
                        'start_date' => $this->request->getVar('start_date'),
                        'end_date' => $this->request->getVar('end_date'),
                        'member_id' => $this->request->getVar('members'),

                    ];
                    // print_r($newData);
                    // exit();
                   
    
                    $task->insert($newData);
                    $stud = new StudentModel();
                    $usee = new UserModel();
                    $data['show'] = $stud->where('studentID', $this->request->getVar('members'))->first();
                    $data['ema'] = $usee->where('userID', $data['show']['userID'])->first();
                  
                    $msg = $this->request->getVar('description');
                    $sub = $this->request->getVar('task');
                     
                    $to = $data['ema']['email'];
                   
                    $subject = $sub;
                    $message = 'You have a new task - '.'<a href="'.base_url().'/viewproject'.'/'.$id.'">'.$msg.'</a>';
                    // $body = 'You have new task on TickTack';
                    $email = \Config\Services::email();

                    $email->setTo($to);
                    $email->setFrom('ticktack667@gmail.com', '@ticktack_proj');
                    $email->setSubject($subject);
                    $email->setMessage($message);
                    // $email->setBody($body);
                    if($email->send()){
                        echo 'Succesfully sent';
                    }else{
                        echo 'error';
                    }

                   
                    $session = session();
                    $session->setFlashdata('success', 'Task successfully created');
                    return redirect()->to(base_url().'/viewproject'.'/'.$id);
          
                }
            }
        
    }
}
