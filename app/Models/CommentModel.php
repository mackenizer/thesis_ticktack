<?php namespace App\Models;

use CodeIgniter\Model;

class CommentModel extends Model{
    protected $table = 'comment';
    protected $primaryKey = 'id';
    protected $allowedFields = ['comment', 'name', 'file', 'project_id', 'comment_status', 'userID'];
    


   
}