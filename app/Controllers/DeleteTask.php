<?php

namespace App\Controllers;

use App\Models\TaskModel;



class DeleteTask extends BaseController
{
	public function index($id)
	{
        if($this->request->getMethod() == 'post'){
                // echo 'xd';
                // echo $id;
                // exit();

                $task = new TaskModel();
          
                $task->delete($id);
        

                $session = session();
                $session->setFlashdata('success', 'Task successfully deleted');
                return redirect()->to(session()->get('_ci_previous_url'));
      
            
        }
      
    }
}
