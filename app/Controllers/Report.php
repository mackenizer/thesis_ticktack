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

                $data['due'] = [];
                if(isset($us)){
                $datas['total'] = $model2->where('project_id', $us['id'])->where('task_status', 'on-going')->findall();
                
               
                foreach ($datas['total'] as $as){
                        $datas['total'] = $model2->where('project_id', $as['end_date'])->findall();
                        
                       


                        $due = strtotime(date('Y-m-d', strtotime(date('Y-m-d', strtotime($as['end_date'])))));
                        $years = floor($due / (365*60*60*24));
                        $months = floor(($due - $years * 365*60*60*24) / (30*60*60*24));
                        $diff =  abs(strtotime(date('Y-m-d')) - $due).'<br>';
                        $duedate = floor(($due - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
                        $today = strtotime(date('Y-m-d'));
                        $years = floor($today / (365*60*60*24));
                        $months = floor(($today - $years * 365*60*60*24) / (30*60*60*24));
                        $diff =  abs(strtotime(date('Y-m-d')) - $today).'<br>';
                        $todays = floor(($today - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
       
                        $equals = $todays - $duedate;

                        if( $equals == 0){

                        
                               $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' '. $as['task'].' is '.'already expire';
                        
                        }elseif($equals < 0 && $equals >-5) {
                                $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' ' .$as['task']. ' is - '.($equals*-1) .' day(s) over due';
                                
                        }elseif($equals <= 3 && $equals > 0){
                               $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' '.$as['task']. ' is - '.$equals .' day(s) near due';
                        }
                }
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
