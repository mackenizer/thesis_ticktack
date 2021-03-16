<?php

namespace App\Controllers;

class Student extends BaseController
{
	public function index()
	{
		$data = [];
		$data['student'] = 'Dashboard';

		

        echo view('templates/studentheader', $data);
        echo view('student/dashboard');
        echo view('templates/studentfooter');
	}

	public function moduleteam()
	{
		$data = [];
		$data['student'] = 'Project Details';

		

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

	
	public function studentresult()
	{
		$data = [];
		$data['student'] = 'Project Details';

		

        echo view('templates/studentheader', $data);
        echo view('student/studentresult');
        echo view('templates/studentfooter');
	}
}
