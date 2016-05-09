<?php
namespace Module\Admin\Controllers; 


class LogoutController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $this->session->destroy();
        $this->response->redirect('admin/login');
    }
    
}