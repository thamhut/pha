<?php
namespace Module\Frontend\Controllers; 


use Module\Frontend\Controllers\ControllerBase;
use \Module\Models\Content;
use \Module\Models\Tags;       
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use \Module\Models\Category;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        $data = array();
        $content = new Content;  
        $content->numItem = 10;
        $content->page = $data['page'] = $page = isset($_GET['page']) && $_GET['page']? (int)$_GET['page']:1;
        $data['data_content'] = $result = $content->getAll();
        $data['lst_item_content'] = $result->items;
        $data['url'] = $_GET['_url'].'?v=1';
        $this->view->data = $data;
    }
    
    public function categoryAction()
    {
        $data = array();
        $content = new Content;  
        $content->numItem = 10;
        $content->page = $data['page'] = $page = isset($_GET['page']) && $_GET['page']? (int)$_GET['page']:1;
        $data['id_level'] = $id = (int)$this->dispatcher->getParam('id');    
        $lstcate = Category::find(array('conditions'=>'id = :id:', 'bind'=>array('id'=>$id)))->toArray();
        
        if($lstcate)
        {
            $arr = array();
            foreach($lstcate as $item)
            {
                $arr[] = $item['id_level'];
            }
            $content->lstcate = implode(',', $arr);
            $data['id_parent'] = $id;
        } 
        else
        {
            $content->id_category = $id;
            $data['id_parent'] = Category::findFirst(array('conditions'=>'id_level = :id:', 'bind'=>array('id'=>$id)))->toArray();
            $data['id_parent'] = $data['id_parent']['id'];
        }
        $data['data_content'] = $result = $content->getAll();
        $data['lst_item_content'] = $result->items;
        $data['url'] = $_GET['_url'].'?v=1';
        $this->view->data = $data;
        
    }
    
    public function detailAction()
    {
        $data = array();
        $data['id'] = $id = $this->dispatcher->getParam('id');
        $result = Content::findFirst(array('conditions'=>'id = :id:', 'bind'=>array('id'=>$id)));
        $result->view = $result->view + 1;    
        $data['content'] = $result->toArray();
        $result->save();
        $tags = Tags::find(array('conditions'=>'lstcontent like :id1: or lstcontent like :id2: or lstcontent like :id3: or lstcontent like :id4:', 'bind'=>array('id1'=>'%,'.$id.',%', 'id2'=>'%'.$id.',%', 'id3'=>'%,'.$id.'%', 'id4' => '%'.$id.'%')))->toArray();
        $lstTag = array();
        $lstid = '(';
        foreach($tags as $item)
        {
            $lstTag[] = $item['name'];
            $lstid .= '"'.str_replace(',', '","', $item['lstcontent']).'"';
        }
        $lstid .= ')';   
        $lstid = str_replace('""', '","', $lstid);
        $query = array(
            'models' => array('Module\Models\Content'),
            'columns' => array('Module\Models\Content.id', 'Module\Models\Content.title'),
            'order' => 'Module\Models\Content.id DESC',
            'limit' => 10,
            'offset' => 0,
        );
        $sql = new Sql($query);
        $sql->where('Module\Models\Content.id IN '.$lstid);
        $sql->andwhere('Module\Models\Content.id != '.$id);
        $result = $sql->getQuery();
        $data['suggest'] = $result->execute()->toArray();
        $data['lstTag'] = $lstTag;
        $this->view->data = $data;
         
        $this->view->meta_title = $result->title;
        $this->view->meta_content = $result->title;
        
    }
}