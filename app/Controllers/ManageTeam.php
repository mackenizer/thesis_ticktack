<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;
class ManageTeam extends BaseController
{
	public function index($id = null)
	{
		$data = [];
        helper('array');

        $data['title'] = 'Manage Team';
        
      

        $projects = new ProjectModel();
        $model1 = new StudentModel();
        $model2 = new AdviserModel();

        $user = $model1->findall();
        $data['students'] = $user;

        $user2 = $model2->findall();
        $data['adviser'] = $user2;

        $proj = $projects->where('id', $id)->first();
        $data['edit'] = $proj;

        $user = $projects->where('id', $id)->first();

        $data['project'] = $user;

       

        // foreach ($data['students'] as $stud)
        //     print_r($stud['studentID']);
        // exit();

        $arr = $data['project']['user_ids'];
            $ex = explode(",", $arr);
            foreach ($ex as $e){
                $data['mem'][$e]  = $model1->where('studentID', $e)->first();
                
                
            }
            


        if($this->request->getMethod() == 'post'){
            $rules = [
                'user_ids' => 'required',
               
               
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo $data['validation']->listErrors();
                
                
               
            }else{
             
               


                $array = $this->request->getVar('user_ids');
 
                $wew = implode(",", $array);


                
                    $newData = [
                        'id' => $this->request->getVar('id'),
                        'user_ids' => $wew,
                    ];

                    // print_r($newData);
                    // exit();
                
               

                $projects->save($newData);

                
                $session = session();
                $session->setFlashdata('success', 'Team successfully updated');
                return redirect()->to(base_url().'/manageteam'.'/'.$id);
            }

     
            }
        

        

        
        echo view('templates/adminheader', $data);
        echo view('manageteam');
        echo view('templates/footer');
	}
}
