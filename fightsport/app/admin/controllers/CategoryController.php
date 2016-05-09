<?php
namespace Module\Admin\Controllers; 

use \Module\Forms\CategoryForm;
use \Module\Models\Category;

class CategoryController extends ControllerBase
{
    public function indexAction()
    {
        $data = array();
        $result = new Category;
        $result = $result->getListCate()->fetchAll();
        $this->view->lstCate = $result;
    }
    
    public function createAction()
    {
        $category = new Category;       
        $form = new CategoryForm;
        $data = array();
        $error = array();
        if($this->request->isPost())
        {
            $form->bind($this->request->getPost(), $category);
            if($form->isValid())
            {
                $category->save();
            }
            else
            {
                foreach($form->getMessages() as $item)
                {
                    $error['field'] = $item->getField();
                    $error['message'] = $item->getMessage();
                    break;
                }
            }
        }
        $this->view->error = $error;
        $this->view->form = $form;
        $this->view->data = $data;
    }
    
    public function editAction()
    {     
        $data = array();       
        $params = $this->dispatcher->getParams();
        $data['id'] = $id = isset($params['0'])?(int)$params['0']:0;
        $error = array();
        $category = Category::findFirst(array("conditions"=>'id_level = :id:', 'bind'=>array('id'=>$id))); 
        //print_r($category->name);die();
        if($id && $category)
        {    
            $category->id_category =  $category->id;
            $form = new CategoryForm($category);
            if($this->request->isPost())
            {
                $form->bind($this->request->getPost(), $category);
                if($form->isValid())
                {
                    $category->save();
                }
                else
                {
                    foreach($form->getMessages() as $item)
                    {
                        $error['field'] = $item->getField();
                        $error['message'] = $item->getMessage();
                        break;
                    }
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
        $error = array();
        $category = Category::findFirst(array("conditions"=>'id_level = :id:', 'bind'=>array('id'=>$id))); 
        if($category->delete())
        {
            $this->response->redirect('admin/category');
        }
        else
        {
            $this->response->redirect('admin/error');
        }
    }
}