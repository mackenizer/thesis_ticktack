<?php

namespace App\Controllers;

class Leader extends BaseController
{
	public function index()
	{
		$data = [];
		$data['leader'] = 'Dashboard';

		

        echo view('templates/leaderheader', $data);
        echo view('leader/dashboard');
        echo view('templates/leaderfooter');
	}


	public function addmodule(){
		$data = [];
		$data['leader'] = 'Add Module';

		

        echo view('templates/leaderheader', $data);
        echo view('leader/addmodule');
        echo view('templates/leaderfooter');
	}

	public function moduleview(){
		$data = [];
		$data['leader'] = 'Project Details';

		

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
