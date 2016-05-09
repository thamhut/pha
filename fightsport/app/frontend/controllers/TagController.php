<?php
namespace Module\Frontend\Controllers; 


use Module\Frontend\Controllers\ControllerBase;
use \Module\Models\Content;
use \Module\Models\Tags;       
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use \Module\Models\Category;
use \Module\Models\BaseModel;

class TagController extends ControllerBase
{
    public function indexAction()
    {  
        $data = array();
        $data['tag'] = $tag = $this->dispatcher->getParams('tag');
        $tag = str_replace('-', ' ', $tag[0]);   
        //print_r($tag);         die();        
        $lstId = Tags::findFirst(array('conditions'=>'name = :name:', 'bind'=>array('name'=>$tag))); 
        if($lstId)
        {
            $lstId = $lstId->toArray();
            $query = array(
                'models' => array('Module\Models\Content'),
                'columns' => array('Module\Models\Content.id', 'Module\Models\Content.title', 'Module\Models\Content.view','Module\Models\Content.poster','Module\Models\Content.content','Module\Models\Content.update_date'),
                'order' => 'Module\Models\Content.id DESC',
                'limit' => 10,
                'offset' => 0,
            );
            $sql = new Sql($query);
            $sql->where('Module\Models\Content.id IN ('.$lstId['lstcontent'].')');
            $result = $sql->getQuery()->execute()->toArray(); 
            $baseModel = new BaseModel;
            $baseModel->items = $result;
            $baseModel->limit = 10;
            $data['page'] = $page = isset($_GET['page']) && $_GET['page']? (int)$_GET['page']:1;
            $baseModel->current = $page;
            $baseModel->total_items = Content::count(array(
                "conditions" => 'id IN ('.$lstId['lstcontent'].')',
            )); 
            $baseModel->setPages() ;
            $data['data_content'] = $baseModel;
            $data['lst_item_content'] = $baseModel->items;
            $data['url'] = $_GET['_url'].'?v=1';
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('');
        }
        
    }
}