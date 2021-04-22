<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;

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
                    echo 'he';
      
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

                    $session = session();
                    $session->setFlashdata('success', 'Task successfully created');
                    return redirect()->to(base_url().'/viewproject'.'/'.$id);
          
                }
            }
        
    }
}
