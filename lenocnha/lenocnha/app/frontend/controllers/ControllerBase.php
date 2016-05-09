<?php
namespace Module\Frontend\Controllers;

use \Module\Models\Category;
use \Module\Models\TopUser;
use \Module\Models\Music;

class ControllerBase extends \Phalcon\Mvc\Controller
{
    public $category_data;
    public $user_session;
    public $city = 0;
    public $router = '';
    public $language = '';
    public function initialize()
    {   
        $this->tag->SetTitle($this->_getTranslation()->_("title_web"));
        if(checkDevice() == 1)
        {
            //Add some local CSS resources
            $this->assets
                ->addCss('public/css/style.css');
    
            //and some local javascript resources
            $this->assets
                ->addJs('public/js/jquery-1.8.2.min.js');
            $this->assets
                ->addJs('public/js/common.js');
        }
        else
        {
            //Add some local CSS resources
            $this->assets
                ->addCss('public/css/jquery.mobile-1.4.2.min.css');
    
            //and some local javascript resources
            $this->assets
                ->addJs('public/js/jquery-1.8.2.min.js');
            $this->assets
                ->addJs('public/js/jquery.mobile-1.4.2.min.js');
            $this->assets
                ->addJs('public/js/common.js');
            $this->assets
                ->addCss('public/css/style_home.css');
        }
            
        if ($this->session->has("user")) {
            $this->view->user = $user = $this->user_session = $this->session->get("user");
        } 
        $category_data = new Category;
        $this->view->setVar("lang", $this->_getTranslation());
        $this->category_data = $this->view->lstcate = $category_data->getAll(); 
        $this->view->topuser = $topuser = TopUser::find()->toArray();
        //print_r($this->dispatcher->getActionName());die();
        if($this->dispatcher->getControllerName() == 'index' ||$this->dispatcher->getControllerName() == 'user' || $this->dispatcher->getControllerName() == 'article')
        {
            $date1 = time();
            $date2 = date('Y-m-d', ($date1 - 2592000));
            $this->view->hot_music = Music::nhacsan_get_music_hot($date2);
            $fdate1 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 604800));
            $fdate2 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 2592000));
            $fdate3 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 31536000));
            $tdate = isset($_GET['tdate']) && $_GET['tdate']?$_GET['tdate']:date('Y-m-d', $date1);
            $this->view->top_music_1 = Music::nhacsan_get_music_top($fdate1, $tdate, 0);
            $this->view->top_music_2 = Music::nhacsan_get_music_top($fdate2, $tdate, 0);
            $this->view->top_music_3 = Music::nhacsan_get_music_top($fdate3, $tdate, 0);
            $this->view->top_video_1 = Music::nhacsan_get_music_top($fdate1, $tdate, 6);
            $this->view->top_video_2 = Music::nhacsan_get_music_top($fdate2, $tdate, 6);
            $this->view->top_video_3 = Music::nhacsan_get_music_top($fdate3, $tdate, 6);
        }
    }
    
    public function _getTranslation()
    {
        //Ask browser what is the best language
        $this->language = $language = 'vn';
        
        //Check if we have a translation file for that lang
        if (file_exists("app/messages/".$language.".php")) {
           require "app/messages/".$language.".php";
        } else {
           // fallback to some default
           require "app/messages/vn.php";
        }
        
        //Return a translation object
        return new \Phalcon\Translate\Adapter\NativeArray(array(
           "content" => $messages
        ));
    }
    
    
    public function setCacheCode()
    {          
        $data = array();
        $this->utils->deletecode('');
        $acode = $this->utils->getcode();
        $data['key'] = md5(strtoupper(implode('',$acode['key'])));
        foreach($acode['value'] as $item)
        {
            $arr['code'][] = $item;
        }
        $data['code'] = $arr['code'];
        return $data;
    }
    
    public static function getLanguage()
    {
        return $this->session->get('language');
    }
    
}