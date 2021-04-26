<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\StudentModel;
use App\Models\LeaderNames;
use App\Models\TaskModel;
use App\Models\ProductivityModel;
use App\Models\DisplayModel;
use App\Models\TasklistAll;
use App\Models\DisplayProd;
use App\Models\CommentModel;
use App\Models\Notification;
use App\Models\ChatModel;


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
        $all = new TaskListAll();
        $myprod = new DisplayProd();
        $comment = new CommentModel();
        $notify = new Notification();
      
  
        
        if($id!=null){
            $user = $model->where('id', $id)->first();
            $p = $names->where('id', $id)->first();
            
            $data['leader'] = $names->where('id', $id)->first();
            $data['project'] = $user;
            $not = $notify->first();
            $x = $comment->findall();
           


            $arr = $data['project']['user_ids'];
            $ex = explode(",", $arr);
            foreach ($ex as $e){
                $data['mem'][$e]  = $students->where('studentID', $e)->first();
                
            }

            $view = $task->where('project_id', $id)->findall();
            $view = $task->where('project_id', $id)->findall();
            $view3 = $prod->where('project_id', $id)->findall();
            $model2 = $all->where('project_id', $id)->findall();
            $model3 = $myprod->where('project_id', $id)->findall();
            $view4 = $prod->where('project_id', $id)->where('member_id', session()->get('studentID'))->findall();
            $view5 = $comment->where('project_id', $id)->findall();
          
            $data['task'] = $view;
            $data['prod'] = $view3;
            $data['alltask'] = $model2;
            $data['produc'] = $model3;
            $data['mytask'] = $view4;
            $data['comment'] = $view5;



            $data['comme'] = $x;
            $data['noti'] = $not;
            $data['pro'] = $p;
            $data['members'] = $user;






    }


    
    

        echo view('templates/adminheader', $data);
        echo view('viewproject');
        echo view('templates/footer');
	}

    // public function chat($id = null){
    //     if($id!=null){
    //         $names = new LeaderNames();
    //         $students = new StudentModel();
    //         $chat = new ChatModel();
    //         $data['leader'] = $names->where('id', $id)->first();
    //         $data['mess'] = $chat->findall();


    //         $arr = $data['project']['user_ids'];
    //         $ex = explode(",", $arr);
    //         foreach ($ex as $e){
    //             $data['mem'][$e]  = $students->where('studentID', $e)->first();
                
    //         }



    //     }

    //     echo view('templates/adminheader', $data);
    //     echo view('chat');
    //     echo view('templates/footer');
    // }

   

       

    
	
}
