<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model{
    protected $table = 'project';
    protected $allowedFields = ['projectTitle', 'leaderID', 'adviserID', 'created_at'];
    


   
}