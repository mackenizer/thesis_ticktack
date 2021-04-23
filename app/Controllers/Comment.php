<?php

namespace App\Controllers;

use App\Models\CommentModel;



class Comment extends BaseController
{
	public function index($id = null)
	{

        if($this->request->getMethod() == 'post'){
            $rules = [
                'comment' => 'required',
        

                
            ];

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
                echo $data['validation']->listErrors();
  
            }else{
                $model = new CommentModel();

                $file = $this->request->getFile('file');

                if($file->isValid() && !$file->hasMoved()){
                    $file->move('./uploads/fileUpload', $file->getName());
                    
                    
                }
               
               

                $newData = [
                    'project_id' => $this->request->getVar('id'),
                    'userID' => $this->request->getVar('user_id'),
                    'file' => $file->getName(),
                    'comment' => $this->request->getVar('comment'),
                    'name' => $this->request->getVar('name'),
                
                   

                ];
               
                // print_r($newData);
                // exit();
               

                $model->insert($newData);
                

                $session = session();
                // $session->setFlashdata('success', 'Progress Successfully Added!');
                return redirect()->to(base_url().'/viewproject'.'/'.$id);
      
            }
        }

    }
}