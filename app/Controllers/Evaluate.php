<?php

namespace App\Controllers;

use App\Models\TaskModel;



class Evaluate extends BaseController
{
	public function index($id = null)
	{

        if($this->request->getMethod() == 'post'){
            $rules = [
             
                'rate' => 'required',
                'evaluate' => 'required',
               
                
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo $data['validation']->listErrors();
               
            }else{
                $task = new TaskModel();
               

                
                $x = $id;
   
                $newData = [
                    'id' => $this->request->getVar('id'),
                    'evaluate' => $this->request->getVar('evaluate'),
                    'rate' => $this->request->getVar('rate'),
                


                ];
                // print_r($newData);
                // exit();
               

                $task->save($newData);

                $session = session();
                $session->setFlashdata('success', 'Task successfully rated!');
                return redirect()->to(base_url().'/viewproject'.'/'.$id);
      
            }
        }

    }
}