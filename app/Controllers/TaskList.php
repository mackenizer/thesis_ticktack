<?php

namespace App\Controllers;
use App\Models\ViewProjects;

class TaskList extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Task List';
        $projects = new ViewProjects();

        
        $view = $projects->findall();
        $data['viewall'] = $view;

        // print_r($view);
        // exit();
        

		

        
        echo view('templates/adminheader', $data);
        echo view('tasklist');
        echo view('templates/footer');
	}
	
}
