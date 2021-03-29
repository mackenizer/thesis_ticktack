<?php namespace App\Models;

use CodeIgniter\Model;

class FileUpload extends Model{
    protected $table = 'files';
    protected $primaryKey = 'fileID';
    protected $allowedFields = ['moduleID', 'studentID', 'file'];
    


   
}