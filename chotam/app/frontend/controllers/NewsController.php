<?php
namespace Module\Frontend\Controllers; 

use Module\Models\Content;
use Module\Models\Category;
use \Chotam\Forms\ContentForm;


class NewsController extends ControllerBase
{
    public function indexAction()
    {
        $form = new ContentForm;
        $content = new Content;
        $error = array();
        $data = array();
        if($this->request->isPost())
        {
            $form->bind($this->request->getPost(), $content);    
            if($content->validateCreate())
            {
                $id_user = isset($this->user_session['id'])?$this->user_session['id']:1;
                $content->id_user = (int)$id_user;
                $content->user_type = (int)$this->request->getPost('nguoi_dang');     
                $content->test = "\x1f\x8b\x08\x00".gzcompress($content->content);          
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
                    $content->img = (string)$upload['des'];
                    if($content->save())
                    {
                        $this->view->done = $this->_getTranslation()->_('create_success');
                        $this->response->redirect($this->router.'detail/'.$this->utils->converToUrl($content->title).'_i'.$content->id.'.html');
                    }
                    else{
                        $error['message'] = $this->_getTranslation()->_('create_error');
                        $data = $this->setCacheCode();
                    } 
                }
            }
            else
            {    
                foreach($content->getMessages() as $item)
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
        $this->view->data = $data;
        $this->view->error = $error;
    }
    
    public function updateAction()
    {
        $data = $code = array();
        $param = $this->dispatcher->getParams();
        $error = array();
        $data['id'] = $id = isset($param[0])?$param[0]:'';
        if($id)
        {
            $user = $this->user_session;
            $data['content_data'] = $content_data = Content::findFirstById($id);
            $lienlac = explode(',', $content_data->lienlac);
            $content_data->sdt = isset($lienlac[0])?$lienlac[0]:'';
            $content_data->email = isset($lienlac[1])?$lienlac[1]:'';
            $content_data->yahoo = isset($lienlac[2])?$lienlac[2]:'';
            $content_data->skype = isset($lienlac[3])?$lienlac[3]:''; 
            $content_data->content = gzuncompress(substr($content_data->test, 4));
            if(isset($user['id']) && isset($content_data->id_user) && $content_data->id_user = $user['id'])
            {
                $form = new ContentForm($content_data, array(
                    'edit' => true
                ));
                if($this->request->isPost())
                {
                    $form->bind($this->request->getPost(), $content_data); 
                    if($content_data->validateCreate())
                    {
                        $id_user = isset($this->user_session['id'])?$this->user_session['id']:1;
                        $content_data->id_user = (int)$id_user;
                        $content_data->user_type = (int)$this->request->getPost('nguoi_dang');   
                        $content_data->test = "\x1f\x8b\x08\x00".gzcompress($content_data->content);        
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
                            $img_old = implode(',', $this->request->getPost('img_old'));
                            $content_data->img = $upload['des'] ? $img_old.','.$upload['des'] : $img_old; 
                            if($content_data->save())                                 
                            {
                                $this->view->done = $this->_getTranslation()->_('create_success');
                                $this->response->redirect($this->router.'detail/'.$this->utils->converToUrl($content_data->title).'_i'.$content_data->id.'.html');
                            }
                            else{
                                $error['message'] = $this->_getTranslation()->_('create_error');
                                $data = $this->setCacheCode();
                            } 
                        }
                    }
                    else
                    {    
                        foreach($content_data->getMessages() as $item)
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
                    $code = $this->setCacheCode();
                }
                $this->view->form = $form;
            }
            else
            {
                 $this->response->redirect('error');
            }
        }
        else
        {
            $this->response->redirect('error');
        }
        $this->view->data = $code; 
        $this->view->id = $id;
        $this->view->error = $error;
        $this->view->content_data = $content_data;
    }
    
    public function deleteAction()
    {
        $param = $this->dispatcher->getParams();
        $data['id'] = $id = isset($param[0])?$param[0]:'';
        if($id)
        {
            $user = $this->user_session;
            $content_data = Content::findFirstById($id);
            if(isset($user['id']) && isset($content_data->id_user) && $user['id'] == $content_data->id_user)
            {
                if ($content_data->delete() == false) {
                    $this->response->redirect('error');
                }
                else
                {
                    $this->response->redirect('news/mynews');
                }
            }
            else
            {
                $this->response->redirect('error');
            }
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
    function mynewsAction()
    {
        $data = array();
        $user = $this->user_session;
        if(isset($user['id']))
        {
            $content = new Content;
            $content->id_user = $user['id'];
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