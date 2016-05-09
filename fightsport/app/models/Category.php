<?php
namespace Module\Models;

use Phalcon\Mvc\Model;

class Category extends Model
{
    public $id_category;
    public function initialize()
    {
    }
    public function getSource()
    {
        return "category";
    }
    
    public function beforeValidation()
    {
        if(!isset($this->create_date))
        {
            $this->create_date = date('Y-m-d H:i:s');
        }
        if(!isset($this->id_category) || $this->id_category == '0')
        {
            $this->id = '0';
        }
        else
        {
            $this->id = $this->id_category;
        }
    }
    
    public function getListCate()
    {
        $sql = "CALL category_get_list();";
        $result = $this->getReadConnection()->query($sql);
        return $result;
    }
}