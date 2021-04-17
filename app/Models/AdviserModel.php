<?php namespace App\Models;

use CodeIgniter\Model;

class AdviserModel extends Model{
    // protected $table = 'adviser';
    // protected $primaryKey = 'adviserID';
    // protected $allowedFields = ['firstname', 'lastname', 'email', 'password', 'updated_at', 'status_a', 'projectID', 'pic_a'];
    // protected $beforeInsert = ['beforeInsert'];
    // protected $beforeUpdate = ['beforeUpdate'];

    protected $table = 'adviser';
    protected $primaryKey = 'adviserID';
    protected $allowedFields = ['userID', 'firstname',  'lastname', 'status_a', 'pic_a'];


    // protected function beforeInsert(array $data){
    //     $data = $this->passwordHash($data);

    //     return $data;
    // }

    // protected function beforeUpdate(array $data){
    //     $data = $this->passwordHash($data);
    //     return $data;
    // }

    // protected function passwordHash(array $data){
    //      if(isset($data['data']['password']))
    //         $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
    //     return $data;
    // }
}