<?php

namespace App\Controllers;

class Admin extends BaseController
{
	public function index()
	{
		$data = [];

		

        echo view('templates/header1', $data);
        echo view('dashboard/admin');
        echo view('templates/footer');
	}

	
}
