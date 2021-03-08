<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Dashboard';

		

        echo view('templates/adminheader', $data);
        echo view('admin/dashboardd');
        echo view('templates/adminfooter');
	}


	public function addteam(){
		$data = [];
		$data['title'] = 'Add Team';

		

        echo view('templates/adminheader', $data);
        echo view('admin/addteam');
        echo view('templates/adminfooter');
	}

	public function viewteam(){
		$data = [];
		$data['title'] = 'View Team';

		

        echo view('templates/adminheader', $data);
        echo view('admin/viewteam');
        echo view('templates/adminfooter');
	}

	public function viewmodule(){
		$data = [];
		$data['title'] = 'View Module';

		

        echo view('templates/adminheader', $data);
        echo view('admin/viewmodule');
        echo view('templates/adminfooter');
	}

	
}
