<?php
namespace Module\Admin\Controllers; 

use \Module\Forms\ArticleForm;
use \Module\Models\Category;
use \Module\Models\Content;
use \Module\Models\Tags;

class ArticleController extends ControllerBase
{
    public function indexAction()
    {
        $data = array();
        $content = new Content;  
        $content->numItem = 30;
        $content->page = $data['page'] = $page = isset($_GET['page']) && $_GET['page']? (int)$_GET['page']:1;
        $data['data_content'] = $result = $content->getAll();
        $data['lst_item_content'] = $result->items;
        $data['_url'] = $_GET['_url'];
        $this->view->data = $data;
    }
    
    public function createAction()
    {
        $content = new Content;       
        $form = new ArticleForm;
        $error = array();
        $data = array();
        if($this->request->isPost())
        {    
            $form->bind($this->request->getPost(), $content);
            $lstTag = explode(',', $this->request->getPost('tags'));
            if($form->isValid())
            {
                $upload = '';
                if ($this->request->hasFiles() == true) {
                     $upload = $this->utils->uploadFile($this->request->getUploadedFiles());
                }
                $upload['des'] = isset($upload['des'])?implode(',', $upload['des']):'';
                $upload['err'] = isset($upload['err'][1])?isset($upload['err'][1]):'';
                $content->poster = (string)$upload['des'];
                $content->save();
                foreach($lstTag as $item)
                {
                    $name = strtolower(trim($item));
                    $tags = Tags::findFirst(array('conditions'=>'name = :name:', 'bind' => array('name' => $name)));
                    if($tags)
                    {
                        if(!strpos($tags->lstcontent, ','.$name.',') && !strpos($tags->lstcontent, $name.',') && !strpos($tags->lstcontent, ','.$name))
                        {
                            $tags->lstcontent = $tags->lstcontent.','.$content->id;
                            $tags->save();
                        }
                    }
                    else
                    {
                        $tag = new Tags;
                        $tag->name = $name;
                        $tag->lstcontent = $content->id;
                        $tag->save();
                    }
                }
            }
            foreach($form->getMessages() as $item)
            {
                $error['field'] = $item->getField();
                $error['message'] = $item->getMessage();
                break;
            }
            
        }
        $this->view->error = $error;
        $this->view->form = $form;
        $this->view->data = $data;
    }
    
    public function editAction()
    {     
        $params = $this->dispatcher->getParams();
        $data['id'] = $id = isset($params['0'])?(int)$params['0']:0;
        $this->view->content = $content = Content::findFirst(array('conditions'=>'id=:id:', 'bind'=>array('id'=>$id)));  
        $error = array();
        $data = array();
        if($id && $content)
        {     
            $tags = Tags::find(array('conditions'=>'lstcontent like :id1: or lstcontent like :id2: or lstcontent like :id3: or lstcontent like :id4:', 'bind'=>array('id1'=>'%,'.$id.',%', 'id2'=>'%'.$id.',%', 'id3'=>'%,'.$id.'%', 'id4' => '%'.$id.'%')))->toArray();
            $lstTag = array();
            foreach($tags as $item)
            {
                $lstTag[] = $item['name'];
            }
            $content->tags = $lstTag = implode(',',$lstTag);       
            $form = new ArticleForm($content); 
            if($this->request->isPost())
            {    
                $form->bind($this->request->getPost(), $content);
                $lstTag = explode(',', $this->request->getPost('tags'));
                if($form->isValid())
                {
                    $upload = '';
                    if ($this->request->hasFiles() == true) {
                         $upload = $this->utils->uploadFile($this->request->getUploadedFiles());
                         $upload['des'] = isset($upload['des'])?implode(',', $upload['des']):'';
                        $upload['err'] = isset($upload['err'][1])?isset($upload['err'][1]):'';
                        $content->poster = (string)$upload['des'];
                    }
                    
                    $content->save();
                    foreach($lstTag as $item)
                    {
                        $name = strtolower(trim($item));
                        $tags = Tags::findFirst(array('conditions'=>'name = :name:', 'bind' => array('name' => $name)));
                        if($tags)
                        {
                            if(!strpos($tags->lstcontent, ','.$name.',') && !strpos($tags->lstcontent, $name.',') && !strpos($tags->lstcontent, ','.$name))
                            {
                                $tags->lstcontent = $tags->lstcontent.','.$content->id;
                                $tags->save();
                            }
                        }
                        else
                        {
                            $tag = new Tags;
                            $tag->name = $name;
                            $tag->lstcontent = $content->id;
                            $tag->save();
                        }
                    }
                }
                foreach($form->getMessages() as $item)
                {
                    $error['field'] = $item->getField();
                    $error['message'] = $item->getMessage();
                    break;
                }
                
            }
            $this->view->error = $error;
            $this->view->form = $form;
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('admin/error');
        }
    }
    
    public function deleteAction()
    {     
        $params = $this->dispatcher->getParams();
        $data['id'] = $id = isset($params['0'])?(int)$params['0']:0;
        $this->view->content = $content = Content::findFirst(array('conditions'=>'id=:id:', 'bind'=>array('id'=>$id)));  
        $error = array();
        $data = array();
        if($id && $content)
        { 
            $content->delete();
            $this->response->redirect('admin/article');
        }
        else
        {
            $this->response->redirect('admin/error');
        }
    }
    
}