<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\ModuleModel;

class Leader extends BaseController
{
	public function index()
	{
		$data = [];
		$data['leader'] = 'Dashboard';

		$module = new ModuleModel();

		$data['module'] = $module->where('projectID', session()->get('projectID'))
				->findall();

		

		

        echo view('templates/leaderheader', $data);
        echo view('leader/dashboard');
        echo view('templates/leaderfooter');
	}


	public function addmodule(){
		$data = [];
		$data['leader'] = 'Add Module';

		$student = new StudentModel();

		$data['member'] = $student->where('projectID', session()->get('projectID'))
				->findall();

		if($this->request->getMethod() == 'post'){
			$rules = [
                'moduleName' => 'required',
                'memberID' => 'required',
                'description' => 'required',
                'dueDate' => 'required',

            ];

			if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{  
                
                $model1 = new ModuleModel();


               

                $newData = [
                    'moduleName' => $this->request->getVar('moduleName'),
                    'memberID' => $this->request->getVar('memberID'),
                    'projectID' => session()->get('projectID'),
                    'description' => $this->request->getVar('description'),
					'dueDate' => $this->request->getVar('dueDate'),
                    
  
                ];

				$model1->insert($newData);
               
                
                $session = session();
                $session->setFlashdata('success', 'Module Added!');
                return redirect()->to('leader');
            }
		}

		

        echo view('templates/leaderheader', $data);
        echo view('leader/addmodule');
        echo view('templates/leaderfooter');
	}

	public function moduleview(){
		$data = [];
		$data['leader'] = 'Project Details';

		$student = new StudentModel();

		$data['member'] = $student->where('projectID', session()->get('projectID'))
				->findall();
		

		

        echo view('templates/leaderheader', $data);
        echo view('leader/moduleview');
        echo view('templates/leaderfooter');
	}

	public function resultmodule(){
		$data = [];
		$data['leader'] = 'Project Details';

		

        echo view('templates/leaderheader', $data);
        echo view('leader/resultmodule');
        echo view('templates/leaderfooter');
	}

	
}
