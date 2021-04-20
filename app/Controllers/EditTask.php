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
        $data['title'] = 'Edit Task';

        $task = new TaskModel();

        $view = $task->where('id', $id)->first();

        $data['task'] = $view;


        // print_r($data['task']);
        // exit();

       
        if($this->request->getMethod() == 'post'){
                $rules = [
                    'task' => 'required',
                    'description' => 'required',
                    'task_status' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    
                ];
    
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    echo 'stop';
                }else{
                   

                    
                    $x = $id;
       
                    $newData = [
                        'id' => $x,
                        'task' => $this->request->getVar('task'),
                        'description' => $this->request->getVar('description'),
                        'project_id' => $this->request->getVar('id'),
                        'start_date' => $this->request->getVar('start_date'),
                        'end_date' => $this->request->getVar('end_date'),
                        'task_status' => $this->request->getVar('task_status'),

                    ];
                    // print_r($newData);
                    // exit();
                   
    
                    $task->save($newData);

                    $session = session();
                    $session->setFlashdata('success', 'Task successfully updated');
                    return redirect()->to(base_url().'/edittask'.'/'.$id);
          
                }
            }

             
        echo view('templates/adminheader', $data);
        echo view('edittask');
        echo view('templates/footer');
        
    }
}
