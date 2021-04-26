<?php namespace App\Models;

use CodeIgniter\Model;

class ChatModel extends Model{
    protected $table = 'chat';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['incoming_msg_id', 'outgoing_msg_id', 'msg', 'file'];
    


   
}