<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\AdviserModel;
use App\Models\ProjectModel;

class AddMembers extends BaseController
{
	public function index()
	{

        $model = new ProjectModel();
        $model1 = new StudentModel();



        $user = $model1->where('email', $this->request->getVar('email'))
                                ->first();
        // $studentID = $user['studentID'];

        if(!$user){
             $session = session();
             $session->setFlashdata('error', 'User does not exist');
             return redirect()->to('moduleview');
        }
        else{
           $data = [

            // 'projectTitle' => $this->request->getVar('projectTitle'),
            // 'leaderID' => $user['studentID'],
            // 'adviserID' => session()->get('adviserID'),
            'studentID' => $user['studentID'],
            'projectID' => session()->get('projectID'),


        
        ];

            $model1->save($data);
           
            

           
            $session = session();
            $session->setFlashdata('success', 'Successfully Added');
            return redirect()->to('moduleview');

        }
		
        
	}

	
}
