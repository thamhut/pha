<?php
namespace Module\Admin\Controllers; 

use \Module\Forms\HotForm;
use \Module\Models\Hot;

class HotController extends ControllerBase
{
    public function indexAction()
    {
        $data = array();
        $this->view->lstHot = Hot::find()->toArray();
    }
    
    public function createAction()
    {
        $hot = new Hot;       
        $form = new HotForm;
        $data = array();
        $error = array();
        if($this->request->isPost())
        {
            $form->bind($this->request->getPost(), $hot);
            if($form->isValid())
            {
                $hot->save();
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
        $hot = Hot::findFirst(array("conditions"=>'id = :id:', 'bind'=>array('id'=>$id))); 
        //print_r($hot->name);die();
        if($id && $hot)
        {    
            $form = new HotForm($hot);
            if($this->request->isPost())
            {
                $form->bind($this->request->getPost(), $hot);
                if($form->isValid())
                {
                    $hot->save();
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
        $hot = Hot::findFirst(array("conditions"=>'id = :id:', 'bind'=>array('id'=>$id))); 
        if($hot->delete())
        {
            $this->response->redirect('admin/hot');
        }
        else
        {
            $this->response->redirect('admin/error');
        }
    }
    
}