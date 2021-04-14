<?php

namespace App\Controllers;
use App\Models\ProjectModel;
use App\Models\ProjectViewModel;
use App\Models\ModuleViewModel;
use App\Models\AdviserModel;
use App\Models\FileUpload;
use App\Models\MessageModel;


class Adviser extends BaseController
{
	public function index()
	{
		$data = [];
		$data['title'] = 'Dashboard';

		$model = new ProjectViewModel();
		$model1 = new ModuleViewModel();
		$adviser = new AdviserModel();

		$data['project'] = $model->where('adviserID', session()->get('adviserID'))->findall();
		$data['members'] = $model1->where('projectID', session()->get('projectID'))
				->findall();

				

		if($this->request->getMethod() == 'post'){
			$rules = [
				'addPic' => 'uploaded[addPic]|is_image[addPic]',
				
			];
			if(!$this->validate($rules)){
				session()->setFlashdata('error', $this->validator);
			}else{
				$adviserr = $this->request->getFile('addPic');
				// print_r($file);
				// exit();
				if($adviserr->isValid() && !$adviserr->hasMoved()){
					$adviserr->move('./uploads/addPic', session()->get('adviserID').'_'. $adviserr->getName());
					
					
				}
				
				$Data = [
		
					'adviserID' => session()->get('adviserID'),
					'pic_a' => $adviserr->getName(),
				];	

				
				// print_r($Data);
				// exit();
				
				$adviser->save($Data);


				$adv = $adviser->where('adviserID', session()->get('adviserID'))
				->first();

				

				 $data = [
					'pic_a' => $adv['pic_a'],
					
				];

				

				
				
				
       			 session()->set($data);

				return redirect()->to('adviser');
			}
		}
		

        echo view('templates/adminheader', $data);
        echo view('adviser/dashboardd');
        echo view('templates/footer');
	}

	


	public function addteam(){
		$data = [];
		$data['title'] = 'Add Team';

		

        echo view('templates/adminheader', $data);
        echo view('adviser/addteam');
        echo view('templates/footer');
	}

	public function viewteam($id = null){
		$data = [];
		$data['title'] = 'View Team';

		

		$student = new ModuleViewModel();
		$project = new ProjectViewModel();
		
		if($id!=null){
			$data['members'] = $student->where('projectID', $id)
				->findall();
			
			$data['project'] = $project->where('projectID', $id)
				->first();
		}
		

		

        echo view('templates/adminheader', $data);
        echo view('adviser/viewteam');
        echo view('templates/footer');
	}

	public function viewmodule($id = null){
		$data = [];
		$data['title'] = 'View Module';

		$module = new ModuleViewModel();
		$fileUpload = new FileUpload();

		if($id!=null){
			
			
			$data['module'] = $module->where('studentID', $id)
				->first();

			$data['files'] = $fileUpload->where('studentID', $id)
				->findall();
		}
		// echo $data['module']['studentID'];
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
					'studentID' => $data['module']['studentID'],
					'file' => $file->getName(),
					'description' => $this->request->getVar('description'),
				];
				$fileUpload->insert($Data);
				return redirect()->to(base_url().'/viewmodule'.'/'.$id);
			}

			// $this->load->helper('download');

			
			// force_download('./uploads/fileUpload', null);
		}

		

        echo view('templates/adminheader', $data);
        echo view('adviser/viewmodule');
        echo view('templates/footer');
	}

	public function chatt($id = null){
		$data = [];
		$data['leader'] = 'Chat';

		$users = new ModuleViewModel();
		// $message = new ViewMessages();
		$message = new MessageModel();

		$data['mess22'] = $message->findall();

		$data['user'] = $users->where('adviserID', session()->get('adviserID'))
				->first();

		$data['display'] = $users->where('adviserID', session()->get('adviserID'))
				->findall();

		
		// print_r($data['mess']);
		// // exit();
		// $data['mess1'] = $message->where('outgoing_msg_id', $data['chatuser']['studentID'])
		// 		->findall();
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

		echo view('templates/newheader', $data);
        echo view('adviser/chatt');
        echo view('templates/footer');
	}

	public function chatuser($id = null){

		$data = [];
		helper(['form']);
		$data['leader'] = 'Chat';
		$chat2 = new ModuleViewModel();
		
		$message = new MessageModel();
		
		
		
		
				// echo $data['mess']['msg'];
				// exit();
	

		if($id!=null){
			

			
			$data['chat'] = $chat2->where('studentID', $id)
				->first();

			// $data['mess'] = $message->findall();
			// echo $data['chat']['adviserID'];
			// exit();

			$data['mess'] = $message
				->findall();

			// $data['mess2'] = $message->where('outgoing_msg_id', $data['chatuser']['studentID'])
			// 	->findall();
			

				
			 

			

				
			
			

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
                    'incoming_msg_id' => $data['chat']['studentID'],
                    'outgoing_msg_id' => session()->get('adviserID'),
                    'msg' => $this->request->getVar('msg'),

                   
                    
  
                ];
				
			
				session()->set($data2);	
				$message->insert($data2);


				 
				
				

				

				return redirect()->to(base_url().'/chatuser'.'/'.$id);


				
			}

		}

		echo view('templates/newheader', $data);
        echo view('adviser/chatuser');
        echo view('templates/footer');

	}

	
}
