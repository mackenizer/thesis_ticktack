<?php

namespace App\Controllers;

class NewProject extends BaseController
{
	public function index()
	{
		$data = [];

        $data['title'] = 'Add Project';
        

		

        
        echo view('templates/adminheader', $data);
        echo view('newproject');
        echo view('templates/footer');
	}
}
