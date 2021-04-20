<?php

namespace App\Controllers;
use App\Models\ProjectModel;

class ProjectList extends BaseController
{
	public function index($id = null)
	{
        $data = [];

        $data['title'] = 'Project List';

        $model = new ProjectModel();


        
       
        if(session()->get('adviserID') != null){
                $user = $model->where('adviserID', session()->get('adviserID'))->findAll();

                
               
                $data['project_count'] = count($model->where('adviserID', session()->get('adviserID'))->findall());
        }
        else {
                 $user['leader'] = $model->where('leader_id', session()->get('studentID'))->findAll();
                 $user['member'] = $model->like('user_ids',session()->get('studentID') )->findAll();
        

                $data['project_count'] = count($user['leader']) + count($user['member']);
                $user = array_merge($user['leader'], $user['member']);

        }
        
       
        $us = $model->where('id', $id)->findall();

        
        $data['project'] = $user;

     

        
        echo view('templates/adminheader', $data);
        echo view('projectlist');
        echo view('templates/footer');
	}
	
}
