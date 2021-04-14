<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\ModuleModel;
use App\Models\ModuleViewModel;
use App\Models\ProjectModel;
use App\Models\ProjectViewModel;
use App\Models\MessageModel;
use App\Models\ViewMessages;
use App\Models\FileUpload;

class Student extends BaseController
{
	public function index($id = null)
	{
		$data = [];
		$data['student'] = 'Dashboard';

		$module = new ModuleViewModel();
		$project = new ProjectViewModel();
		$studentModel = new StudentModel();
		
		$data['project'] = $module->where('studentID', session()->get('studentID'))
			->first();

		// $data['module'] = $module->where('projectID', session()->get('projectID'))
		// 		->findall();

		if($id!=null){
			
			
			
			$data['project'] = $project->where('projectID', $id)
				->first();
		}

		

		

        echo view('templates/studentheader', $data);
        echo view('student/dashboard');
        echo view('templates/footer');
	}

	public function moduleteam()
	{
		$data = [];
		$data['student'] = 'Project Details';

		$module = new ModuleViewModel();
		$project = new ProjectViewModel();

		$data['module'] = $module->where('projectID', session()->get('projectID'))
				->findall();

		$data['project'] = $project->where('projectID', session()->get('projectID'))
				->first();

		

        echo view('templates/studentheader', $data);
        echo view('student/moduleteam');
        echo view('templates/footer');
	}

	public function studentmodule()
	{
		$data = [];
		$data['student'] = 'Project Details';

		

        echo view('templates/studentheader', $data);
        echo view('student/studentmodule');
        echo view('templates/footer');
	}

	
	public function studentresult($id = null)
	{
		$data = [];
		$data['student'] = 'Project Details';

		$module = new ModuleViewModel();
		$fileUpload = new FileUpload();

		if($id!=null){
			
			
			
			$data['module'] = $module->where('studentID', $id)
				->first();
				
			$data['files'] = $fileUpload->where('studentID', $id)
				->findall();
		}

		// echo $data['module']['moduleID'];
		// exit();

		if($this->request->getMethod() == 'post'){
			$rules = [
				'fileUpload' => 'uploaded[fileUpload]',
				'description' => 'required',
			];
			if(!$this->validate($rules)){
				session()->setFlashdata('error', $this->validator);
			}else{
				$file = $this->request->getFile('fileUpload');
				// print_r($file);
				// exit();
				if($file->isValid() && !$file->hasMoved()){
					$file->move('./uploads/fileUpload', $file->getName());
					
					
				}
				
				$Data = [
					'moduleID' => $data['module']['moduleID'],
					'studentID' => session()->get('studentID'),
					'file' => $file->getName(),
					'description' => $this->request->getVar('description'),
				];
				$fileUpload->insert($Data);
				return redirect()->to(base_url().'/studentresult'.'/'.$id);
			}

			// $this->load->helper('download');

			
			// force_download('./uploads/fileUpload', null);
		}

        echo view('templates/studentheader', $data);
        echo view('student/studentresult');
        echo view('templates/footer');
	}

	public function studentchat($id = null){

		$data = [];
		$data['student'] = 'Chat';

		$users = new ModuleViewModel();
		$message = new MessageModel();

		$data['user'] = $users->where('projectID', session()->get('projectID'))
				->first();

		$data['display'] = $users->where('projectID', session()->get('projectID'))
				->findall();

		$data['mess'] = $message->where('incoming_msg_id', session()->get('incoming_msg_id'))
				->findall();
		// $data['pics'] = $users->where('projectID', session()->get('projectID'))
		// 		->first();



		// echo $data['display']['pic'];
		// exit();

		// $data['display'] = $users->where('studentID', session()->get('projectID'))
		// 		->first();
		

		if($id!=null){
			
			
			// $data['users'] = $project->where('projectID', $id)
			// 	->first();

			
			$data['pics'] = $users->where('studentID', $id)
				->findall();

			
			
		}

		echo view('templates/studentheader', $data);
        echo view('student/studentchat');
        echo view('templates/footer');


	}

	public function userstudentchat($id = null){

		$data = [];
		helper(['form']);
		$data['student'] = 'Chat';
		$chat = new ModuleViewModel();
		
		$message = new MessageModel();
		
		
		
		
				// echo $data['mess']['msg'];
				// exit();
	

		if($id!=null){
			

			
			$data['chatuser'] = $chat->where('studentID', $id)
				->first();

			$data['mess1'] = $message->where('incoming_msg_id',$id)
				->findall();
			
			$data['mess2'] = $message
				->findall();
			// $data['mess1'] = $message->where('outgoing_msg_id', $id)
			// 	->findall();

			// $data['mess2'] = $message->where('outgoing_msg_id', $data['chatuser']['studentID'])
			// 	->findall();

			// echo $data['chatuser']['studentID'];
			// exit();
			
				
			 

			
				

				
			
			

			// $data['users'] = $chatmsg->where('studentID', $id)
			// 	->first();
			
		}

		if($this->request->getMethod() == 'post'){
			$rules = [
                'msg' => 'required',
                
            ];
			if(!$this->validate($rules)){
                $data['validation'] = $this->validator;

				
            }else{ 

				
				

				
                $data2 = [
                    'incoming_msg_id' => session()->get('studentID'),
                    'outgoing_msg_id' => $data['chatuser']['studentID'],
                    'msg' => $this->request->getVar('msg'),

                   
                    
  
                ];
				
				
				// session()->set($data2);	
				$message->insert($data2);


				 
				
				

				

				return redirect()->to(base_url().'/userstudentchat'.'/'.$id);


				
			}

		}

		echo view('templates/studentheader', $data);
        echo view('student/userstudentchat');
        echo view('templates/footer');


	}
}
