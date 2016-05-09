<?php
namespace Module\Frontend\Controllers;

class LogoutController extends ControllerBase
{
    public function indexAction()
    {
        if($this->user_session)
        {
            $user = $this->user_session;
            $data = array();
            
            $this->session->remove("user");
            $this->response->redirect();
        }
        else
        {
            $this->response->redirect();
        }
    }
}
