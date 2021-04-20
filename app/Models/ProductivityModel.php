<?php namespace App\Models;

use CodeIgniter\Model;

class ProductivityModel extends Model{
    protected $table = 'user_productivity';
    protected $primaryKey = 'id';
    protected $allowedFields = ['project_id', 'task_id', 'comment', 'date','file', 'start_time', 'end_time', 'user_id', 'time_rendered', 'date_created'];
    


   
}