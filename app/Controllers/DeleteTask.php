<?php

namespace App\Controllers;

use App\Models\TaskModel;



class DeleteTask extends BaseController
{
	public function index($id)
	{
        if($this->request->getMethod() == 'post'){
                $rules = [
                        'id' => 'required',

                    ];
        
                    if(!$this->validate($rules)){
                        $data['validation'] = $this->validator;
                        echo 'heheheeh';
          
                    }else{
      

                        $task = new TaskModel();

                        $newData = [
                                'i' => $this->request->getVar('id'),
                               
        
                            ];
                
                        $task->delete($newData);
                

                        $session = session();
                        $session->setFlashdata('success', 'Task successfully deleted');
                        // return redirect()->to(base_url().'/dashboard');
                        return redirect()->to(session()->get('_ci_previous_url'));
        
                        }
                }
        
        }
}
