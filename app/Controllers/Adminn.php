<?php

namespace App\Controllers;

class Adminn extends BaseController
{
	public function index()
	{
		$data = [];

		

        echo view('templates/header1', $data);
        echo view('dashboard/adviser');
        echo view('templates/footer');
	}

	
}
