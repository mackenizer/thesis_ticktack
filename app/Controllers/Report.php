<?php

namespace App\Controllers;

class Report extends BaseController
{
	public function index()
	{
        $data = [];

        $data['title'] = 'Progress Report';
        

		

        
        echo view('templates/adminheader', $data);
        echo view('report');
        echo view('templates/footer');
	}
	
}
