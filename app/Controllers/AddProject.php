<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\AdviserModel;
use App\Models\ProjectModel;

class AddProject extends BaseController
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
             return redirect()->to('adviser');
        }
        else{
           $data = [

            'projectTitle' => $this->request->getVar('projectTitle'),
            'leaderID' => $user['studentID'],
            'adviserID' => session()->get('adviserID'),

        
        ];

            $model->insert($data);
            $projectID = $model->getInsertID();

            $data2 = [
                'projectTitle' => $this->request->getVar('projectTitle'),
                'studentID' => $user['studentID'],
                'leader' => 'yes',
                'projectID'    => $projectID,
            ];

            $model1->save($data2);
            $session = session();
            $session->setFlashdata('success', 'Successfully Added');
            return redirect()->to('adviser');

        }
		
        
	}

	
}
