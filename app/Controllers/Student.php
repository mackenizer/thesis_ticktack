<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\ModuleModel;
use App\Models\ModuleViewModel;
use App\Models\ProjectModel;
use App\Models\ProjectViewModel;

class Student extends BaseController
{
	public function index($id = null)
	{
		$data = [];
		$data['student'] = 'Dashboard';

		$module = new ModuleViewModel();
		$project = new ProjectViewModel();
		
		$data['project'] = $module->where('studentID', session()->get('studentID'))
			->first();

		// $data['module'] = $module->where('projectID', session()->get('projectID'))
		// 		->findall();

		if($id!=null){
			
			
			
			$data['project'] = $project->where('projectID', $id)
				->first();
		}

		

        echo view('templates/studentheader', $data);
        echo view('student/dashboard');
        echo view('templates/studentfooter');
	}

	public function moduleteam()
	{
		$data = [];
		$data['student'] = 'Project Details';

		$module = new ModuleViewModel();
		$project = new ProjectViewModel();

		$data['module'] = $module->where('projectID', session()->get('projectID'))
				->findall();

		$data['project'] = $project->where('projectID', session()->get('projectID'))
				->first();

		

        echo view('templates/studentheader', $data);
        echo view('student/moduleteam');
        echo view('templates/studentfooter');
	}

	public function studentmodule()
	{
		$data = [];
		$data['student'] = 'Project Details';

		

        echo view('templates/studentheader', $data);
        echo view('student/studentmodule');
        echo view('templates/studentfooter');
	}

	
	public function studentresult($id = null)
	{
		$data = [];
		$data['student'] = 'Project Details';

		$module = new ModuleViewModel();

		if($id!=null){
			
			
			
			$data['module'] = $module->where('studentID', $id)
				->first();
		}

        echo view('templates/studentheader', $data);
        echo view('student/studentresult');
        echo view('templates/studentfooter');
	}
}
