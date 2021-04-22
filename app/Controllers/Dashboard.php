<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\TaskModel;
use App\Models\LeaderNames;
use App\Models\StudentModel;

class Dashboard extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Dashboard';

        $model = new ProjectModel();
        $model2 = new TaskModel();
        $model3 = new LeaderNames();
        $student = new StudentModel();
        
        
        if(session()->get('adviserID') != null){
                $user = $model3->where('adviserID', session()->get('adviserID'))->findAll();
                $disp = $model->where('leader_id', session()->get('adviserID'))->first();
                
                
               
         
               
                foreach ($user as $us){
                        $data['total'] = $model2->where('project_id', $us['id'])->findall();
                        $data['total1'] = $model2->where('project_id', $us['id'])->where('task_status', 'complete')->findall();
             
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);
                
                           
                                // echo  $data['total_task'][$us['id']];
                               
                        }else{
                                $data['progress'][$us['id']] = 0;
                                
                        }

                       
                       $data['total_task'][$us['id']] = count($data['total']);
                     
                        // echo $data['completed_task'][$us['id']] = count($data['total1']);
                   
                        
                       
                        
                }
              
                

                // print_r($data['total']);
                // print_r($data['total']);
                // exit();
                

                
               
                $data['project_count'] = count($model->where('adviserID', session()->get('adviserID'))->findall());
        }
        else {
                $disp = $model->where('leader_id', session()->get('studentID'))->first();

                $stud = $student->where('studentID', session()->get('studentID'))->first();
                 $user['leader'] = $model3->where('leader_id', session()->get('studentID'))->findAll();
                 $user['member'] = $model3->like('user_ids',session()->get('studentID') )->findAll();
                 $count = 0;

                 foreach ($user['leader'] as $proj){
                        $x= $proj['id'];
                        $a = $model2->where('project_id', $x)->findall();
                        $count = count($a);


                 }
            
                $data['project_count'] = count($user['leader']) + count($user['member']);
              
                
                $user = array_merge($user['leader'], $user['member']);
                
                
                
                $count_task = 0;
                $count_complete = 0;

                foreach ($user as $us){
                        $data['total'] = $model2->where('project_id', $us['id'])->findall();
                        $data['total1'] = $model2->where('project_id', $us['id'])->where('task_status', 'complete')->findall();
                      
                        // $count += count($data['total']);
                        $a = $model2->where('project_id', $us['id'])->findall();
                        $count += count($a);

               
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);
                                // count($data['total1']) / ($data['total'])
                                // $data['progress'] = number_format(($count_complete / $count_task) * 100, 2);
                        }else{
                                $data['progress'][$us['id']] = 0;
                        }

                $data['total_task'][$us['id']] = count($data['total']);
                        
                }
               
     
               
                $data['count'] = $count;
                $data['lead'] = $disp;

               
                
                


        }

       

       
        

        $data['lead'] = $disp;
        $data['project'] = $user;
    
        
        
      


        
        echo view('templates/adminheader', $data);
        echo view('dashboard');
        echo view('templates/footer');
	}
	
}
