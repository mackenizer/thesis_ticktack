<?php

namespace App\Controllers;

class ProjectList extends BaseController
{
	public function index()
	{
        $data = [];

        $data['title'] = 'Project List';
        

		

        
        echo view('templates/adminheader', $data);
        echo view('projectlist');
        echo view('templates/footer');
	}
	
}
