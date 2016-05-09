<?php
namespace Module\Frontend\Controllers; 

use \Module\Models\Music;
use \Chotam\Forms\MusicForm;
use Module\Models\MusicDate;
use Phalcon\Mvc\Model\Transaction\Manager as TxManager;

class ArticleController extends ControllerBase
{
    public function indexAction()
    {
        $this->view->session = $session = $this->user_session;
        if(isset($session['id']))
        {
            $music = new Music;       
            $form = new MusicForm;
            $error = array();
            $data = array();
            $music->id_user = $session['id'];
            if($this->request->isPost())
            {    
                $form->bind($this->request->getPost(), $music);
                if($music->validationMusic())
                {
                    if($this->request->getPost('namecode') != md5($this->request->getPost('incode')))
                    {
                         $data = $this->setCacheCode();
                         $error['field'] = 'incode';
                         $error['message'] = $this->_getTranslation()->_('code_not_equal');  
                    }
                    else
                    {     
                        if($music->save())
                        {
                            $this->view->done = $this->_getTranslation()->_('register_success');
                        }
                        else{
                             $error['message'] = $this->_getTranslation()->_('register_error');
                             $data = $this->setCacheCode();
                        }
                    }
                }
                else
                {   
                    foreach($music->getMessages() as $item)
                    {
                        $error['field'] = $item->getField();
                        $error['message'] = $item->getMessage();
                        break;
                    }
                    $data = $this->setCacheCode();
                } 
            }
            else
            {
                $data = $this->setCacheCode();
            }
            $this->view->error = $error;
            $this->view->form = $form;
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('user/login');
        }
    }
    
    public function editAction()
    {
        $this->view->session = $session = $this->user_session;
        $data['id'] = $id = isset($_GET['id'])?(int)$_GET['id']:'';
        $music = Music::findFirstById($id);
        if($music && $music->id_user == $session['id'])
        {    
            $music->category = $music->id_cate;
            $music->content = $music->description;
            $music->link = $music->url;
            $form = new MusicForm($music);
            $error = array();
            $data = array();
            if($this->request->isPost())
            {    
                $form->bind($this->request->getPost(), $music);
                if($music->validationMusic())
                {
                    if($this->request->getPost('namecode') != md5($this->request->getPost('incode')))
                    {
                         $data = $this->setCacheCode();
                         $error['field'] = 'incode';
                         $error['message'] = $this->_getTranslation()->_('code_not_equal');  
                    }
                    else
                    {     
                        if($music->save())
                        {
                            $this->view->done = $this->_getTranslation()->_('register_success');
                        }
                        else{
                             $error['message'] = $this->_getTranslation()->_('register_error');
                             $data = $this->setCacheCode();
                        }
                    }
                }
                else
                {   
                    foreach($music->getMessages() as $item)
                    {
                        $error['field'] = $item->getField();
                        $error['message'] = $item->getMessage();
                        break;
                    }
                    $data = $this->setCacheCode();
                } 
            }
            else
            {
                $data = $this->setCacheCode();
            }
            $this->view->error = $error;
            $this->view->form = $form;
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
    public function actionAction()
    {
        $lstselect = isset($_POST['select'])?$_POST['select']:'';
        $url = isset($_GET['url'])?$_GET['url']:$this->url->get();
        $this->view->session = $session = $this->user_session;
        if($lstselect && isset($session['id']))
        {
            $music = new Music;
            foreach($lstselect as $imusic=>$v)
            {
                if($v == 'on')
                {
                    $music->nhacsan_delete_music($session['id'], $imusic);
                    $this->response->redirect($url);
                }
            }
        }
        else
        {
            $this->response->redirect($url);
        }
    }
}