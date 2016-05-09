<?php
namespace Module\Models;

use Phalcon\Mvc\Model;

class Tags extends Model
{
    public function initialize()
    {
    }
    public function getSource()
    {
        return "tags";
    }
    
    public function beforeValidation()
    {
        $this->name = strtolower($this->name);
    }
    
}