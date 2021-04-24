<?php

namespace App\Controllers;
use App\Models\ViewProjects;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;

class EditProject extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Edit Project';
        
        // $students = new StudentModel();
        // $model2 = new AdviserModel();
        $projects = new ProjectModel();

        // $user2 = $model2->findall();
        // $data['adviser'] = $user2;


        
        $user = $projects->where('id', $id)->first();
        // $stat = $projects->where('id', $id)->findall();
        // $user2 = $students->findall();
        // $data['students'] = $user2;
        $data['edit'] = $user;
        // $data['editt'] = $stat;

        $datas = $this->request->getVar('id');
       

        
        if($this->request->getMethod() == 'post'){
            $rules = [
                'name' => 'required',
                'description' => 'required',
                'start_date' => 'required',
                'end_date' => 'required',
               
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo 'fail';
                
               
            }else{
                
                

                // $array = $this->request->getVar('user_ids');
            
 
                // $wew = implode(",", $array);
                $new = $id;


            
                    $newData = [
                        'id' => $new,
                        'name' => $this->request->getVar('name'),
                        'description' => $this->request->getVar('description'),
                        'start_date' => $this->request->getVar('start_date'),
                        'end_date' => $this->request->getVar('end_date'),
         

                    ];

                $projects->save($newData);

                // print_r($newData);
                // exit();
    
                $session = session();
                $session->setFlashdata('success', 'Successfully Updated!');
                return redirect()->to(base_url().'/editproject'.'/'.$id);
            

     
            }
        }
        

		

        
        echo view('templates/adminheader', $data);
        echo view('editproject');
        echo view('templates/footer');
	}
	
}
