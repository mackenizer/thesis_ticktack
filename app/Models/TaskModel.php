<?php namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model{
    protected $table = 'task_list';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'task', 'description', 'task_status', 'date_created', 'start_date', 'end_date'];
    


   
}