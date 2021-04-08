<?php

namespace App\Controllers;

use App\Models\StudentModel;

class Profile extends BaseController
{
	public function index()
	{

        $studentModel = new StudentModel();

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

				return redirect()->to('student');
			}
		}

	}
}
