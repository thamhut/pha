<?php
namespace Module\Frontend\Controllers; 

use \Module\Models\User;
use \Chotam\Forms\RegisterForm;
use \Module\Models\Music;

class UserController extends ControllerBase
{
    public function indexAction()
    {
        $data = array();
        $this->view->session = $session = $this->user_session;
        $this->view->id = $id = ($this->dispatcher->getParam('id')) ? (int)$this->dispatcher->getParam('id') : (isset($session['id'])?$session['id']:'');
        if($id)
        {
            $music = new Music;
            $data['page'] = $page = isset($_GET['page'])&&$_GET['page']? $_GET['page']:1;
            $music->play = $data['play'] = $play = isset($_GET['play'])&&$_GET['play']?$_GET['play']:0;
            $music->_like = $data['like'] = $data['_like'] = $like = isset($_GET['like'])&&$_GET['like']?$_GET['like']:0;
            $music->_like = $data['like'] = $data['_like'] = $like = isset($_GET['_like'])&&$_GET['_like']?$_GET['_like']:0;
            $music->download = $data['download'] =  $download = isset($_GET['download'])&&$_GET['download']?$_GET['download']:0;
            $music->date_sort = $data['date'] =  $date = isset($_GET['date'])&&$_GET['date']?$_GET['date']:0;
            $data['id'] = $music->id_user = $id;
            $data['info'] = User::findFirst($id);
            $data['info']->num = $num = Music::count(array(
                "id_user = :id_user:",
                "bind" => array('id_user' => $id),
            ));
            $like = Music::sum(array(
                "column" => "_like",
                "id_user = :id_user:",
                "bind" => array('id_user' => $id),
                "group" => "id_user",
            ));
            $like = $like->toArray();
            $data['info']->like = isset($like[0]['sumatory'])?$like[0]['sumatory']:0;
            $dislike = Music::sum(array(
                "column" => "dislike",
                "id_user = :id_user:",
                "bind" => array('id_user' => $id),
                "group" => "id_user",
            ));
            $dislike = $dislike->toArray();
            $data['info']->dislike = isset($dislike[0]['sumatory'])?$dislike[0]['sumatory']:0;
            $data['data_content'] = $data_content = $music->getlistMusicByCate($page, 30);
            $data['lst_item_content'] = $data_content->items;
            $data['url'] = $_GET['_url'];
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect('error');
        }
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
                        $data['login'] = $this->language;
                        $this->session->set('user', $data);
                        $user_save = User::findFirst($data['id']);
                        $user_save->online_date = date('Y-m-d H:i:s');
                        $user_save->save();
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
                    $upload = '';
                    if ($this->request->hasFiles() == true) {
                         $upload = $this->utils->uploadFile($this->request->getUploadedFiles());
                    }
                    $upload['des'] = isset($upload['des'])?implode(',', $upload['des']):'';
                    $upload['err'] = isset($upload['err'][1])?isset($upload['err'][1]):'';
                    $user->avata = (string)$upload['des'];
                    $user->password = md5($user->password);
                    if($user->save())
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
                        $upload = '';
                        if ($this->request->hasFiles() == true) {
                             $upload = $this->utils->uploadFile($this->request->getUploadedFiles());
                        }
                        $upload['des'] = isset($upload['des'])?implode(',', $upload['des']):'';
                        $upload['err'] = isset($upload['err'][1])?isset($upload['err'][1]):'';
                        $user_data->avata = (string)$upload['des'];
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
            $this->view->user_old = $user_old;
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
}