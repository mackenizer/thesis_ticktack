<?php namespace App\Models;

use CodeIgniter\Model;

class ModuleModel extends Model{
    protected $table = 'module';
    protected $primaryKey = 'moduleID';
    protected $allowedFields = ['moduleName', 'memberID', 'projectID', 'description', 'dueDate'];
    


   
}