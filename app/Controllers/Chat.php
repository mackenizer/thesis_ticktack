<?php

namespace App\Controllers;

use App\Models\TaskModel;
use App\Models\ChatModel;



class Chat extends BaseController
{
	public function index($id = null)
	{

		$data = [];
		$data['title'] = 'Video Chat';



		echo view('templates/adminheader', $data);
        echo view('chat');
        echo view('templates/footer');

       

    }
}