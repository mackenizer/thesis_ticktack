<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
	public function index()
	{
		$data = [];

		

        echo view('templates/header1', $data);
        echo view('dashboard/student');
        echo view('templates/footer');
	}

	public function adviser()
	{
		$data = [];

		

        echo view('templates/header1', $data);
        echo view('dashboard/adviser');
        echo view('templates/footer');
	}
}
