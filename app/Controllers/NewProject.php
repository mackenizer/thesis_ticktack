<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;
class NewProject extends BaseController
{
	public function index()
	{
		$data = [];
        helper('array');

        $data['title'] = 'Add Project';
        


        $model = new ProjectModel();
        $model1 = new StudentModel();
        $model2 = new AdviserModel();

        $user = $model1->findall();
        $data['students'] = $user;

        $user2 = $model2->findall();
        $data['adviser'] = $user2;

       

        // foreach ($data['students'] as $stud)
        //     print_r($stud['studentID']);
        // exit();

     

        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => 'required|is_unique[project_list.name]',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
               
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                
                
               
            }else{
             
                $model = new ProjectModel();
                $students = new StudentModel();


                $array = $this->request->getVar('user_ids');
 
                $wew = implode(",", $array);


                
                    $newData = [
                        'name' => $this->request->getVar('name'),
                        'description' => $this->request->getVar('description'),
                        'start_date' => $this->request->getVar('start_date'),
                        'end_date' => $this->request->getVar('end_date'),
                        'leader_id' => session()->get('studentID'),
                        'adviserID' => $this->request->getVar('adviser_id'),
                        'user_ids' => $wew,
                    ];
                
               

                $model->insert($newData);

                
                $session = session();
                $session->setFlashdata('success', 'Project successfully created');
                return redirect()->to('dashboard');
            }

     
            }
        

        

        
        echo view('templates/adminheader', $data);
        echo view('newproject');
        echo view('templates/footer');
	}
}
