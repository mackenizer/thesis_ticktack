<?php namespace App\Models;

use CodeIgniter\Model;

class MessageModel extends Model{
    protected $table = 'messages';
    
    protected $allowedFields = ['incoming_msg_id', 'outgoing_msg_id', 'msg'];
    


   
}