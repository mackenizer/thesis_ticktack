<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\ProjectViewModel;
use App\Models\ModuleViewModel;
use App\Models\AdviserModel;


class Adviser extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Dashboard';

		$model = new ProjectViewModel();
		$model1 = new ModuleViewModel();

		$data['project'] = $model->where('adviserID', session()->get('adviserID'))->findall();
		$data['members'] = $model1->where('projectID', session()->get('projectID'))
				->findall();



		

        echo view('templates/adminheader', $data);
        echo view('adviser/dashboardd');
        echo view('templates/adminfooter');
	}

	


	public function addteam(){
		$data = [];
		$data['title'] = 'Add Team';

		

        echo view('templates/adminheader', $data);
        echo view('adviser/addteam');
        echo view('templates/adminfooter');
	}

	public function viewteam($id = null){
		$data = [];
		$data['title'] = 'View Team';

		

		$student = new ModuleViewModel();
		$project = new ProjectViewModel();
		
		if($id!=null){
			$data['members'] = $student->where('projectID', $id)
				->findall();
			
			$data['project'] = $project->where('projectID', $id)
				->first();
		}
		

		

        echo view('templates/adminheader', $data);
        echo view('adviser/viewteam');
        echo view('templates/adminfooter');
	}

	public function viewmodule($id = null){
		$data = [];
		$data['title'] = 'View Module';

		$module = new ModuleViewModel();

		if($id!=null){
			
			
			$data['module'] = $module->where('studentID', $id)
				->first();
		}

		

        echo view('templates/adminheader', $data);
        echo view('adviser/viewmodule');
        echo view('templates/adminfooter');
	}

	
}
