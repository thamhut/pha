<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use \Module\Models\BaseModel;
use Phalcon\Mvc\Model\Validator\Regex as RegexValidator;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength;
use \Phalcon\Mvc\Model\Message as Message;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Content extends Model
{
    public $tags;
    public $page;
    public $numItem;
    public $lstcate;
    public function initialize()
    {
    }
    public function getSource()
    {
        return "content";
    }
    
    public function beforeValidation()
    {
        if(!isset($this->create_date))
        {
            $this->create_date = date('Y-m-d H:i:s');
        }
        $this->update_date = date('Y-m-d H:i:s');
    }
    
    public function getAll()
    {
        $condition = $parameter = $parameter_count = array();
        $condition_count = "";
        $page = $this->page - 1;
        $idCate = isset($this->id_category)?(int)$this->id_category:'';
        $query = array(
            'models' => array('Module\Models\Content'),
            'columns' => array('Module\Models\Content.view','Module\Models\Content.poster', 'Module\Models\Content.id', 'Module\Models\Content.title','Module\Models\Content.content','Module\Models\Content.update_date', 'Module\Models\Category.name'),
            'order' => 'Module\Models\Content.id DESC',
            'limit' => $this->numItem,
            'offset' => $page * $this->numItem,
        );
        
        $sql = new Sql($query);
        $sql->where(' true '); 
        if($idCate)
        {
            $condition_count .= ' id_category = :id_category: ';
            $parameter = array('id_category' => $idCate);
            $sql->andwhere('Module\Models\Content.id_category = '.$idCate);
        }
        if(isset($this->lstcate))
        {
            $this->lstcate = '("'.str_replace(',','","',$this->lstcate).'")';
            $sql->andwhere('Module\Models\Content.id_category IN '.$this->lstcate);
            $condition_count .= ' id_category IN '.$this->lstcate;
        }
            
        $sql->innerJoin('Module\Models\Category', 'Module\Models\Category.id_level = Module\Models\Content.id_category');
        $result = ($sql->getQuery());
        $baseModel = new BaseModel;
        $baseModel->items = $result->execute()->toArray();
        $baseModel->limit = $this->numItem;
        $baseModel->current = $page+1;
        $baseModel->total_items = Content::count(array(
            "conditions" => $condition_count,
            "bind"  => $parameter,
        )); 
        $baseModel->setPages() ; 
        return $baseModel;
    }
    
    public static function getByView()
    {
        $query = array(
            'models' => array('Module\Models\Content'),
            'columns' => array('Module\Models\Content.view','Module\Models\Content.poster', 'Module\Models\Content.id', 'Module\Models\Content.title','Module\Models\Content.update_date'),
            'order' => 'Module\Models\Content.view DESC',
            'limit' => 10,
            'offset' => 0,
        );
        $sql = new Sql($query);
        $result = ($sql->getQuery());
        return $result->execute()->toArray();
    }
    
}