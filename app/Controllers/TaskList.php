<?php

namespace App\Controllers;

class TaskList extends BaseController
{
	public function index()
	{
        $data = [];

        $data['title'] = 'Task List';
        

		

        
        echo view('templates/adminheader', $data);
        echo view('tasklist');
        echo view('templates/footer');
	}
	
}
