<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\TaskModel;

class Dashboard extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Dashboard';

        $model = new ProjectModel();
        $model2 = new TaskModel();
        
        
        if(session()->get('adviserID') != null){
                $user = $model->where('adviserID', session()->get('adviserID'))->findAll();

                
               
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
                        // $count_task += count($data['total']);
                        // $count_complete += count($data['total1']);

                         
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);
                                // count($data['total1']) / ($data['total'])
                                // $data['progress'] = number_format(($count_complete / $count_task) * 100, 2);
                        }else{
                                $data['progress'][$us['id']] = 0;
                        }

                       
                        
                }
                
                
               
                $data['count'] = $count;
                
                // print_r($data['progress']);
                // exit();
                
                

                


        }

      
        

        
        

        // echo $data['progress'];
        // exit();

        
        $data['project'] = $user;

        // print_r($data['progress']);
        // exit();
        

		

        
        echo view('templates/adminheader', $data);
        echo view('dashboard');
        echo view('templates/footer');
	}
	
}
