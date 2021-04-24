<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\TaskModel;

class Report extends BaseController
{
	public function index()
	{
        $data = [];

        $data['title'] = 'Progress Report';

        $model = new ProjectModel();
        $model2 = new TaskModel();
        
        
        if(session()->get('adviserID') != null){
                $user = $model->where('adviserID', session()->get('adviserID'))->findAll();
                
               
         
               
                foreach ($user as $us){
                        $data['total'] = $model2->where('project_id', $us['id'])->findall();
                        $data['total1'] = $model2->where('project_id', $us['id'])->where('task_status', 'complete')->findall();

                     
             
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);
                                              
                                $data['total_task'][$us['id']] = count($data['total']);
                                $data['completed_task'][$us['id']] = count($data['total1']);
                               
                                
                        }else{
                                $data['progress'][$us['id']] = 0;
                                $data['total_task'][$us['id']] = 0;
                                $data['completed_task'][$us['id']] = 0;
                        }

                $data['total_task'][$us['id']];
                $data['completed_task'][$us['id']];
                        
                       
                        
                }
                

        //        echo count($data['total1']);
        //         exit();

                
               
                $data['project_count'] = count($model->where('adviserID', session()->get('adviserID'))->findall());
        }
        else {
                 $user['leader'] = $model->where('leader_id', session()->get('studentID'))->findAll();
                 $user['member'] = $model->like('user_ids',session()->get('studentID') )->findAll();
                 $count;

                 foreach ($user['leader'] as $proj){
                        $x= $proj['id'];
                        $a = $model2->where('project_id', $x)->findall();
                        $count = count($a);


                 }
                //  echo $count;
                //  exit();
                 
                $count = 0;
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
                                $data['total_task'][$us['id']] = count($data['total']);
                                $data['completed_task'][$us['id']] = count($data['total1']);
                        }else{
                                $data['progress'][$us['id']] = 0;
                        }

                       
                        
                }

                $data['total_task'][$us['id']];
                $data['completed_task'][$us['id']];
                
               
     
               
                $data['count'] = $count;
                
                


        }

              
       

        
        $data['project'] = $user;
        // print_r($data['project']);
        // exit();
       
        

		

        
        echo view('templates/adminheader', $data);
        echo view('report');
        echo view('templates/footer');
	}
	
}
