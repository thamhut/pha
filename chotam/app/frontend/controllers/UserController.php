<?php
namespace Module\Frontend\Controllers;

use \Module\Models\User;
use Chotam\Forms\RegisterForm;
use Module\Models\Content;
use Module\Models\Category; 
use \Phalcon\Mvc\Model\Message as Message;

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $user = new User;
        $user->validationRegister();
        
        die();
    }
    
    public function loginAction()
    {
        $session = $this->user_session;
        if(!isset($session['id']) && !$session['id'] && $session['id'] == '')
        {
            $user = new User;
            $data = array();
            $url = isset($_GET['url'])?$_GET['url']:$this->url->get('/');
            $this->view->errUser = '';
            if($this->request->isPost() == true)
            {
                $user->username = $this->request->getPost("username");
                $user->password = $this->request->getPost("password");
                if($user->validationLogin())
                {
                    $user_data = $user->login();
                    if($user_data)
                    {
                        $data = $this->user_session;
                        $data['id'] = $user_data->id;
                        $data['username'] = $user_data->username;
                        $data['group'] = $user_data->group;
                        $data['core'] = $user_data->core;
                        $data['login'] = $this->language;
                        $this->session->set('user', $data);
                        $this->response->redirect($url);
                    }
                    else
                    {
                        $this->view->errUser = 1;
                    }
                }
                else
                {
                    $this->view->errUser = 1;
                }
            }
        }
        else
        {    
            $this->response->redirect('/');
        }
    }
    
    public function registerAction()
    {   
        $user = new User;       
        $form = new RegisterForm;
        $error = array();
        $data = array();
        if($this->request->isPost())
        {    
            $form->bind($this->request->getPost(), $user);
            if($user->validationRegister())
            {
                if($this->request->getPost('namecode') != md5($this->request->getPost('incode')))
                {
                     $data = $this->setCacheCode();
                     $error['field'] = 'incode';
                     $error['message'] = $this->_getTranslation()->_('code_not_equal');
                }
                else
                {
                    $user->password = md5(trim($user->password));
                    if($user->save())
                    {
                        $this->view->done = $this->_getTranslation()->_('register_success');
                    }
                    else{
                        $data = $this->setCacheCode();
                         $error['message'] = $this->_getTranslation()->_('register_error');
                    }
                }
            }
            else
            {
                foreach($user->getMessages() as $item)
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
    
    function updateAction()
    {
        $user = $this->user_session;
        $data = array();
        $error = array();
        if(isset($user['id']))
        {
            $user_old = $user_data = User::findFirstById($user['id']);    
            $form = new RegisterForm($user_data, array(
                'edit' => true
            ));
            if (!$user_data) {
                $this->response->redirect('error');
            }
            if($this->request->isPost())
            {
                $form->bind($this->request->getPost(), $user_data);
                if($user_data->validationRegister($user_old))
                {
                    if($this->request->getPost('namecode') != md5($this->request->getPost('incode')))
                    {
                         $data = $this->setCacheCode();
                         $error['field'] = 'incode';
                         $error['message'] = $this->_getTranslation()->_('code_not_equal');
                    }
                    else
                    {
                        if($user_data->save())
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
                    foreach($user_data->getMessages() as $item)
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
            
            $this->view->form = $form;
            $this->view->error = $error;
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
    function changepassAction()
    {
        $user = $this->user_session;
        $data = array();
        $error = array();
        if(isset($user['id']))
        {
            $user_data = User::findFirstById($user['id']);    
            $form = new RegisterForm($user_data, array(
                'edit' => true
            ));
            if (!$user_data) {
                $this->response->redirect('error');
            }
            if($this->request->isPost())
            {
                $user_old = $user_data->toArray();
                $form->bind($this->request->getPost(), $user_data);
                if($user_data->validationChangePass($user_old))
                {
                    if($this->request->getPost('namecode') != md5($this->request->getPost('incode')))
                    {
                         $data = $this->setCacheCode();
                         $error['field'] = 'incode';
                         $error['message'] = $this->_getTranslation()->_('code_not_equal');
                    }
                    else
                    {
                        if($user_data->save())
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
                    foreach($user_data->getMessages() as $item)
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
            
            $this->view->form = $form;
            $this->view->error = $error;
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
    public function mynewsAction()
    {
        $data = array();
        $user = $param = $this->dispatcher->getParams();
        $data['id'] = $id = isset($param[0])?$param[0]:'';
        if(isset($id))
        {
            $content = new Content;
            $content->id_user = $id;
            $data['page'] = $cPage = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;
            $data['category'] = $category = isset($_GET['category']) && $_GET['category'] ? $_GET['category'] : 0;
            $data['city'] = $city = isset($_GET['city']) && $_GET['city'] ? $_GET['city'] : 0;
            $content->city = $city;
            if(!$category)
            {
                for($i = 1; $i < 100; ++$i)
                {
                     $category .= ','.$i;
                }
            }
            $data['data_content'] = $data_content = $content->getCateByIdlevel($category, $cPage, 30);
            $data['lst_item_content'] = $data_content->items; 
            $data['url'] = $_GET['_url'].'?v=0';  
        }
        $this->view->data = $data;
    }
}