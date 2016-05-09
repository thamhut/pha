<?php
namespace Module\Models;

use Phalcon\Mvc\Model;

class TopUser extends Model
{
    public function initialize()
    {
    }
    public function getSource()
    {
        return "top_user_tb";
    }
    
}