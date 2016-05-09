<?php
namespace Module\Frontend\Controllers;

use \Module\Models\Category;
use \Module\Models\Content;
use \Module\Models\Hot;

class ControllerBase extends \Phalcon\Mvc\Controller
{
    public $category;
    public function initialize()
    {   
        $this->tag->SetTitle($this->_getTranslation()->_("title_web"));
        $this->view->setVar("lang", $this->_getTranslation());
        $this->assets
            ->addCss('public/css/style.css');
        //and some local javascript resources
        
        $this->assets
            ->addJs('public/js/jquery-1.8.2.min.js');
        $this->assets
            ->addJs('public/js/jquery.flexslider.min.js');
        $this->assets
            ->addJs('public/js/common.js');
        $this->category = $category = Category::find()->toArray();
        $this->view->category = $category;
        $contentview = Content::getByView();
        $this->view->contentview = $contentview;
        $this->view->hot = $hot = Hot::find()->toArray();
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