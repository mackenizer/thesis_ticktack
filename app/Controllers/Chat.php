<?php namespace App\Controllers;

class Chat extends BaseController
{
	public function index()
	{
		$data = [];

        $data['leader'] = 'Project Details';

		echo view('templates/leaderheader', $data);
        echo view('leader/chat');
        echo view('templates/leaderfooter');
	}

	

}