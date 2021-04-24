<?php

namespace App\Controllers;
use App\Models\TaskModel;

class UpdateTaskStatus extends BaseController
{
	public function index($id = null)
	{

        if($this->request->getMethod() == 'post'){
            $rules = [
             
                'task_status' => 'required',
               
                
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo $data['validation']->listErrors();
               
            }else{
                $task = new TaskModel();
               

                
   
                $newData = [
                    'id' => $this->request->getVar('id'),
                    'task_status' => $this->request->getVar('task_status'),
                    
                


                ];
                // print_r($newData);
                // exit();
               

                $task->save($newData);

                $session = session();
                $session->setFlashdata('success', 'Task successfully updated!');
                return redirect()->to(base_url().'/viewproject'.'/'.$id);
      
            }
        }

    }
}