<?php
namespace Module\Admin\Controllers;


class ControllerBase extends \Phalcon\Mvc\Controller
{
    public function initialize()
    {   
        if (!$this->session->has("user")) {
            $this->response->redirect('admin/login');
        }
        $this->tag->SetTitle($this->_getTranslation()->_("title_web"));
        $this->view->setVar("lang", $this->_getTranslation());
        $this->assets
            ->addCss('public/css/style.css');

        //and some local javascript resources
        $this->assets
            ->addJs('public/js/jquery-1.8.2.min.js');
        $this->assets
            ->addJs('public/js/common.js');
    }
    
    public function _getTranslation()
    {
        //Ask browser what is the best language
        $this->language = $language = 'en';
        
        //Check if we have a translation file for that lang
        if (file_exists("app/messages/".$language.".php")) {
           require "app/messages/".$language.".php";
        } else {
           // fallback to some default
           require "app/messages/en.php";
        }
        
        //Return a translation object
        return new \Phalcon\Translate\Adapter\NativeArray(array(
           "content" => $messages
        ));
    }
    
    
}