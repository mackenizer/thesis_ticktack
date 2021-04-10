<?php

namespace App\Controllers;
use App\Models\StudentModel;
use App\Models\ModuleModel;
use App\Models\ModuleViewModel;
use App\Models\ProjectModel;
use App\Models\ProjectViewModel;
use App\Models\FileUpload;
use App\Models\MessageModel;
use App\Models\ViewMessages;

class Leader extends BaseController
{
	public function index($id = null)
	{
		$data = [];
		$data['leader'] = 'Dashboard';

		$module = new ModuleViewModel();
		$project = new ProjectViewModel();
		$studentModel = new StudentModel();
		
		$data['module'] = $module->where('studentID', session()->get('studentID'))
			->first();

		// $data['module'] = $module->where('projectID', session()->get('projectID'))
		// 		->findall();

		if($id!=null){
			
			
			$data['module'] = $project->where('projectID', $id)
				->first();
		}

		if($this->request->getMethod() == 'post'){
			$rules = [
				'addPic' => 'uploaded[addPic]|is_image[addPic]',
				
			];
			if(!$this->validate($rules)){
				session()->setFlashdata('error', $this->validator);
			}else{
				$student = $this->request->getFile('addPic');
				// print_r($file);
				// exit();
				if($student->isValid() && !$student->hasMoved()){
					$student->move('./uploads/addPic', session()->get('studentID').'_'. $student->getName());
					
					
				}
				
				$Data = [
		
					'studentID' => session()->get('studentID'),
					'pic' => $student->getName(),
				];
				
				$studentModel->save($Data);

				$stud = $studentModel->where('studentID', session()->get('studentID'))
				->first();

				

				 $data = [
					'pic' => $stud['pic'],
					
				];
				

       			 session()->set($data);

				return redirect()->to('leader');
			}
		}

		

		

		

        echo view('templates/leaderheader', $data);
        echo view('leader/dashboard');
        echo view('templates/footer');
	}


	public function addmodule(){
		$data = [];
		$data['leader'] = 'Add Module';

		$student = new StudentModel();

		$data['member'] = $student->where('projectID', session()->get('projectID'))
				->findall();

		if($this->request->getMethod() == 'post'){
			$rules = [
                'moduleName' => 'required',
                'memberID' => 'required',
                'description' => 'required',
                'dueDate' => 'required',

            ];

			if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{  
                
                $model1 = new ModuleModel();


               

                $newData = [
                    'moduleName' => $this->request->getVar('moduleName'),
                    'memberID' => $this->request->getVar('memberID'),
                    'projectID' => session()->get('projectID'),
                    'description' => $this->request->getVar('description'),
					'dueDate' => $this->request->getVar('dueDate'),
                    
  
                ];

				$model1->insert($newData);
               
                
                $session = session();
                $session->setFlashdata('success', 'Module Added!');
                return redirect()->to('leader');
            }
		}

		

        echo view('templates/leaderheader', $data);
        echo view('leader/addmodule');
        echo view('templates/footer');
	}

	public function moduleview(){
		$data = [];
		$data['leader'] = 'Project Details';

		$student = new ModuleViewModel();
		
		$project = new ProjectViewModel();

		$data['member'] = $student->where('projectID', session()->get('projectID'))
				->findall();

		$data['project'] = $project->where('projectID', session()->get('projectID'))
				->first();
		

		

        echo view('templates/leaderheader', $data);
        echo view('leader/moduleview');
        echo view('templates/footer');
	}

	public function resultmodule($id = null){
		$data = [];
		$data['leader'] = 'Project Details';

		

		$project = new ProjectViewModel();
		$module = new ModuleModel();
		$model1 = new ModuleViewModel();
		$fileUpload = new FileUpload();

		

		

		if($id!=null){
			
			
			$data['project'] = $project->where('projectID', $id)
				->first();

			
			$data['module'] = $model1->where('studentID', $id)
				->first();

			$data['files'] = $fileUpload->where('studentID', $id)
				->findall();
			
		}

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
				return redirect()->to(base_url().'/resultmodule'.'/'.$id);
			}

			$this->load->helper('download');

			
			force_download('./uploads/fileUpload', null);
		}


		

        echo view('templates/leaderheader', $data);
        echo view('leader/resultmodule');
        echo view('templates/footer');
	}

	public function download($id){

		
			
			$this->load->helper('download');

			
			force_download('./uploads/fileUpload', null);
			
			
			
		

	}

	public function chat($id = null){

		$data = [];
		$data['leader'] = 'Chat';

		$users = new ModuleViewModel();
		// $message = new ViewMessages();
		$message = new MessageModel();

		$data['mess22'] = $message->findall();

		$data['user'] = $users->where('projectID', session()->get('projectID'))
				->first();

		$data['display'] = $users->where('projectID', session()->get('projectID'))
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
        echo view('leader/chat');
        echo view('templates/footer');


	}

	public function userschat($id = null){

		$data = [];
		helper(['form']);
		$data['leader'] = 'Chat';
		$chat = new ModuleViewModel();
		
		$message = new MessageModel();
		
		
		
		
				// echo $data['mess']['msg'];
				// exit();
	

		if($id!=null){
			

			
			$data['chatuser'] = $chat->where('studentID', $id)
				->first();

			// $data['mess'] = $message->findall();

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
                    'incoming_msg_id' => session()->get('studentID'),
                    'outgoing_msg_id' => $data['chatuser']['studentID'],
                    'msg' => $this->request->getVar('msg'),

                   
                    
  
                ];
				
				
				session()->set($data2);	
				$message->insert($data2);


				 
				
				

				

				return redirect()->to(base_url().'/userschat'.'/'.$id);


				
			}

		}

		echo view('templates/newheader', $data);
        echo view('leader/userschat');
        echo view('templates/footer');


	}

	public function video(){

		$data = [];
		$data['leader'] = 'Project Details';

		echo view('templates/leaderheader', $data);
        echo view('leader/video');
        echo view('templates/footer');

		
	}

	
}
