<?php
namespace Module\Frontend\Controllers;

class LogoutController extends ControllerBase
{
    public function indexAction()
    {
        $lang = $this->language == 'en' ? 'sg' : '';
        if($this->user_session)
        {
            $user = $this->user_session;
            $data = array();
            if(isset($user['city']))
            {
                $data['city'] = $user['city'];
            }
            $this->session->set("user", $data);
            $this->response->redirect($lang);
        }
        else
        {
            $this->response->redirect($lang);
        }
    }
}
