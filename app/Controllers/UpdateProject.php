<?php

namespace App\Controllers;
use App\Models\ViewProjects;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\AdviserModel;
use App\Models\TaskModel;

class UpdateProject extends BaseController
{
	public function index($id = null)
	{

          

            
                $rules = [
                    'status' => 'required',
            
                ];

            

                if(!$this->validate($rules)){
                    $data['validation'] = $this->validator;
                    echo $data['validation']->listErrors();
                    
                
                }else{

                    $model = new ProjectModel();

            
                    $newData = [
                        'id' => $this->request->getVar('id'),
                        'status' => $this->request->getVar('status'),
                


                    ];

                    // print_r($newData);
                    // exit();


                    if($this->request->getVar('status') == 'complete'){

                        $task = new TaskModel();

                        $tasks = $task->where('project_id', $this->request->getVar('id'))->findall();
                        $total_task = count($tasks);
                        $total_grade = 0;
                        foreach ($tasks as $tas){
                            if($tas['rate'] != null){
                                $total_grade+=$tas['rate'];
                            }
                            else{
                                
                                $session = session();
                                $session->setFlashdata('error', 'All Task has not been graded!');
                                return redirect()->to(base_url().'/dashboard'.'/'.$id);
                            }
                            
                        }
                        $ave['average_grade'] = $total_grade/$total_task;

                        $newData['grade'] =  $ave['average_grade'];


                    }
                    

                

                    $model->save($newData);

                    
                    $session = session();
                    $session->setFlashdata('success', 'Successfully Updated!');
                    return redirect()->to(base_url().'/dashboard'.'/'.$id);
            

     
            }
        
        


		

	}
	
}
