<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;
use App\Models\ProductivityModel;
use App\Models\DisplayModel;

class ViewProject extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Project Details';

        $model = new ProjectModel();
        $students = new StudentModel();
        $names = new LeaderNames();
        $task = new TaskModel();
        $prod = new DisplayModel();



        
        if($id!=null){
            $user = $model->where('id', $id)->first();
            
            $data['leader'] = $names->where('id', $id)->first();
            $data['project'] = $user;
           
            

        //    echo $data['leader']['leader_id'] == session()->get('studentID');
        //     exit();



            $arr = $data['project']['user_ids'];
            $ex = explode(",", $arr);
            foreach ($ex as $e){
                $data['mem'][$e]  = $students->where('studentID', $e)->first();
            }

            // print_r ($data['mem'][$e]);
            // exit();
            
           

            $view = $task->where('project_id', $id)->findall();
            $view2 = $task->where('project_id', $id)->findall();
            $view3 = $prod->where('project_id', $id)->findall();
          
            $data['task'] = $view;
            $data['task2'] = $view2;
            $data['prod'] = $view3;
            
            // print_r($data['prod']);
            // exit();
         
            $data['members'] = $user;
    }
    
    

        echo view('templates/adminheader', $data);
        echo view('viewproject');
        echo view('templates/footer');
	}

   

       

    
	
}
