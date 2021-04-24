<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;

class EditTask extends BaseController
{
	public function index($id = null)
	{
        $data = [];
        $data['title'] = 'Progress Section';

        
      
            
      
        


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
                    echo $data['validation']->listErrors();
                   
                }else{
                    $task = new TaskModel();
                   

                    
                    $x = $id;
       
                    $newData = [
                        'id' => $this->request->getVar('task_id'),
                        'task' => $this->request->getVar('task'),
                        'description' => $this->request->getVar('description'),
                        'project_id' => $this->request->getVar('id'),
                        'start_date' => $this->request->getVar('start_date'),
                        'end_date' => $this->request->getVar('end_date'),
                        // 'task_status' => $this->request->getVar('task_status'),
                        'member_id' => $this->request->getVar('members'),


                    ];
                    // print_r($newData);
                    // exit();
                   
    
                    $task->save($newData);

                    $session = session();
                    $session->setFlashdata('success', 'Task successfully updated');
                    return redirect()->to(base_url().'/viewproject'.'/'.$id);
          
                }
            }

            
          
            echo view('templates/adminheader', $data);
            echo view('edittask');
            echo view('templates/footer');
   
        
    }
}
