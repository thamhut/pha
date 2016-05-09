<?php
namespace Module\Models;

use Phalcon\Mvc\Model;

class Hot extends Model
{
    public function initialize()
    {
    }
    public function getSource()
    {
        return "hot";
    }
    
    public function beforeValidation()
    {
        $this->create_date = date('Y-m-d H:i:s');
        $this->name = strtolower($this->name);
    }
    
}