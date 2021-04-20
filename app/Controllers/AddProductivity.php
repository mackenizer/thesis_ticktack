<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;
use App\Models\ProductivityModel;

class AddProductivity extends BaseController
{
	public function index($id = null)
	{
        if($this->request->getMethod() == 'post'){
                $rules = [
                    'comment' => 'required',
                    'task_id' => 'required',
                    'date' => 'required',
                    'start_time' => 'required',
                    'end_time' => 'required',
                    'file' => 'uploaded[file]',
              
                   
                    
                ];
    
                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    echo $data['validation']->listErrors();
      
                }else{
                    $model = new ProductivityModel();

                    $file = $this->request->getFile('file');

                    if($file->isValid() && !$file->hasMoved()){
                        $file->move('./uploads/fileUpload', $file->getName());
                        
                        
                    }
                    $time = strtotime($this->request->getVar('end_time')) - strtotime($this->request->getVar('start_time'));
                    echo ($time/60)/60;
                   

                    $newData = [
                        'project_id' => $this->request->getVar('project_id'),
                        'task_id' => $this->request->getVar('task_id'),
                        'comment' => $this->request->getVar('comment'),
                        'date' => $this->request->getVar('date'),
                        'start_time' => $this->request->getVar('start_time'),
                        'end_time' => $this->request->getVar('end_time'),
                        'user_id' => session()->get('studentID'),
                        'file' => $file->getName(),
                        'time_rendered' => ($time/60)/60,
                       

                    ];
                    
                    
                   
    
                    $model->insert($newData);

                    $session = session();
                    $session->setFlashdata('success', 'Progress Successfully Added!');
                    return redirect()->to(base_url().'/viewproject'.'/'.$id);
          
                }
            }
        
    }
}
