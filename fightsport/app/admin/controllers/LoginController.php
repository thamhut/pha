<?php
namespace Module\Admin\Controllers; 


class LoginController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        $this->assets
            ->addCss('public/css/style.css');

        //and some local javascript resources
        $this->assets
            ->addJs('public/js/jquery-1.8.2.min.js');
        $this->assets
            ->addJs('public/js/common.js');
        if(isset($_POST['pass']) && $_POST['pass']== 'ditimchantam')
        {
            $this->session->set('user', 1);
            $this->response->redirect('admin');
        }
    }
    
}