<?php namespace App\Models;

use CodeIgniter\Model;

class ProjectModel extends Model{
    protected $table = 'project_list';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'status', 'start_date', 'end_date', 'leader_id', 'adviserID', 'user_ids', 'date_created', 'grade'];
    


   
}