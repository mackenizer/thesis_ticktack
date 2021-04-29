<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ChatModel;



class Receiver extends BaseController
{
	public function index($id = null)
	{

		$data = [];
		$data['title'] = 'Video Chat';



		echo view('templates/adminheader', $data);
        echo view('receiver');
        echo view('templates/footer');

       

    }
}