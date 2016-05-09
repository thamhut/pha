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
        return "raovat_catgory";
    }

    public function getAll()
    {
        
        $category = Category::find(array(
            "columns" => "id, name, id_level"
        ));
        if($category)
            return $category;
        else
            return array();
    }
    
    public function search()
    {
        $condition = "TRUE";
        $parameter = array(); 
        if(isset($this->id))
        {
            $condition .= " AND id = :id: ";
            $parameter['id'] = $this->id;
        }
        if(isset($this->id_level))
        {
            $condition .= " AND id_level = :id_level: ";
            $parameter['id_level'] = $this->id_level;
        }
        if(isset($this->name))
        {
            $condition .= " AND name = :name: ";
            $parameter['name'] = $this->name;
        }
        if(isset($this->name1))
        {
            $condition .= " AND name1 = :name1: ";
            $parameter['name1'] = $this->name1;
        }
        $data = Category::find(array(
            "conditions"    =>  $condition,
            "bind"  =>  $parameter,          
        )); 
        return $data->toArray();
    }
    
}