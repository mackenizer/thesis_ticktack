<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\TaskModel;
use App\Models\LeaderNames;
use App\Models\StudentModel;
use App\Models\Notification;
use App\Models\CommentModel;

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
        $notify = new Notification();
        $com = new CommentModel();
        
        
        if(session()->get('adviserID') != null){
                $user = $model3->where('adviserID', session()->get('adviserID'))->findAll();
                $disp = $model->where('leader_id', session()->get('adviserID'))->first();
                $not = $notify->first();
                $x = $com->findall();
                $p = $model3->where('adviserID', session()->get('adviserID'))->first();



               
                foreach ($user as $us){
                        $data['total'] = $model2->where('project_id', $us['id'])->findall();

                        $data['total1'] = $model2->where('project_id', $us['id'])->where('task_status', 'complete')->findall();
             
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);
                

                               
                        }else{
                                $data['progress'][$us['id']] = 0;
                                
                        }

                       
                       $data['total_task'][$us['id']] = count($data['total']);
                     
   
                }
               
                
                if(isset($us)){
                $data['due'] = [];
              
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
                                 $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' ' .$as['task']. ' is - '.($equals*-1) .' day(s) near due';
                                 
                         }elseif($equals <= 3 && $equals > 0){
                                $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' '.$as['task']. ' is - '.$equals .' day(s) over due';
                         }
                }
        }


   

                
               
                $data['project_count'] = count($model->where('adviserID', session()->get('adviserID'))->findall());
        }
        else {
                $disp = $model->where('leader_id', session()->get('studentID'))->first();
                $not = $notify->first();
                $x = $com->findall();
                $p = $model3->where('adviserID', session()->get('adviserID'))->first();
                $disp = $model->where('leader_id', session()->get('adviserID'))->first();
                

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

                        $a = $model2->where('project_id', $us['id'])->findall();
                        $count += count($a);

               
                        if(count($data['total']) != 0){
                                $data['progress'][$us['id']] = number_format((count($data['total1']) / count($data['total'])* 100),2);

                        }else{
                                $data['progress'][$us['id']] = 0;
                        }

                $data['total_task'][$us['id']] = count($data['total']);
                        
                }
            
       
                $datas['count_due'] = $model2->where('member_id', session()->get('studentID'))->where('task_status', 'on-going')->findall();
            
                foreach ($datas['count_due'] as $as){
                        $datas['count_due'] = $model2->where('project_id', $as['end_date'])->findall();
                        
                       

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
                        // echo date('Y-m-d');
       
                        $equals = $todays - $duedate;

                        if( $equals == 0){

                        
                               $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' '. $as['task'].' is '.'already expire';

                        
                        }elseif($equals < 0 && $equals >-5) {
                                $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' ' .$as['task']. ' is - '.($equals*-1) .' day(s) near due';
                                
                        }elseif($equals <= 3 && $equals > 0){
                               $data['due'][$as['id']] = 'Project ID #'.$as['project_id'].' '.$as['task']. ' is - '.$equals .' day(s) over due';
                        }
                }
               
     
               
                $data['count'] = $count;
                $data['lead'] = $disp;
                $data['noti'] = $not;
                $data['comme'] = $x;
                $data['project'] = $user;

        }

       

       
    

        $data['lead'] = $disp;
        $data['project'] = $user;
        $data['noti'] = $not;
        $data['comme'] = $x;
        $data['pro'] = $p;
      
       

    
        // print_r($data['noti']);
        // exit();
        
      


        
        echo view('templates/adminheader', $data);
        echo view('dashboard');
        echo view('templates/footer');
	}
	
}
