<?php

namespace App\Controllers;
use App\Models\FileUpload;
use App\Models\ModuleViewModel;

class File extends BaseController
{
	public function index()
	{

		$fileUpload = new FileUpload();
		
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
				
			}

			$this->load->helper('download');

			
			force_download('./uploads/fileUpload', null);
		}

	}
}
