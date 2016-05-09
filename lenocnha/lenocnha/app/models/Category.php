<?php
namespace Module\Models;

use Phalcon\Mvc\Model;

class Category extends Model
{
    public function initialize()
    {
    }
    public function getSource()
    {
        return "category_tb";
    }
    public function getAll()
    {
        
        $category = Category::find(array(
            "columns" => "id, name"
        ));
        if($category)
            return $category;
        else
            return array();
    }
}