<?php namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model{
    protected $table = 'students';
    protected $primaryKey = 'studentID';
    protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'leader', 'projectID', 'status', 'updated_at'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];


    protected function beforeInsert(array $data){
        $data = $this->passwordHash($data);

        return $data;
    }

    protected function beforeUpdate(array $data){
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data){
         if(isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        return $data;
    }
}