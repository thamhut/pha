<?php
namespace Module\Frontend\Controllers;

use Module\Models\Category;

class ControllerBase extends \Phalcon\Mvc\Controller
{
    public $category_data;
    public $user_session;
    public $city = 0;
    public $router = '';
    public $language = '';
    public function initialize()
    {
        if(!$this->session->has('language'))
        {
            $this->session->set('language','vn');
        }

        $this->tag->SetTitle($this->_getTranslation()->_("title_web"));
        if(checkDevice() == 0 || ($this->session->get('language') == 'en'))
        {
            //Add some local CSS resources
            $this->assets
                ->addCss('public/css/style_home.css');
            $this->assets
                ->addCss('public/css/bjqs.css');

            //and some local javascript resources
            $this->assets
                ->addJs('public/js/jquery-1.8.2.min.js');
            $this->assets
                ->addJs('public/js/bjqs-1.3.min.js');
            $this->assets
                ->addJs('public/js/common.js');
            $this->assets
                ->addJs('public/js/lightbox-2.6.min.js');
        }
        elseif(($this->session->get('language') == 'vn'))
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
        }

        if ($this->session->has("user")) {
            $this->view->user = $user = $this->user_session = $this->session->get("user");
            $this->city = isset($user['city']) ? $user['city'] : $this->city;
            if(($this->session->get('language') == 'en') && $user['login'] == 'vn')
            {
                $this->response->redirect('logout');
            }
            if(($this->session->get('language') == 'vn') && $user['login'] == 'en')
            {
                $this->response->redirect('logout');
            }
        }
        $category_data = new Category;
        $this->view->setVar("lang", $this->_getTranslation());
        $this->category_data = $this->view->category_data = $category_data->getAll();
        $cateArr = array();
        $nameArr = array();
        $cateSelect = array();
        foreach($this->category_data as $icate)
        {
            if($icate['id'] == 0)
            {
                $nameArr[$icate['id_level']] = $icate['name'];
            }
            else
            {
                $cateArr[$icate['id']][$icate['id_level']] = $icate['name'];
            }
        }
        foreach($cateArr as $k=>$icateArr)
        {
            $cateSelect[$nameArr[$k]]   =  $icateArr ;
        }
        $this->view->cateSelect = $cateSelect;
        $this->view->router = '';
        if(($this->session->get('language') == 'en'))
        {
            $this->router = $this->view->router = '';
        }
    }

    public function _getTranslation()
    {
        if(($this->session->get('language') == 'en'))
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
        else
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

    public function writeFile($id, $json){
        $path = '/../../filecache/p_'.$id;
        $file = fopen($path, 'a');
        fwrite($file, $json);
        fclose($file);
    }

    public function readFile($id){
        $path = '/../../filecache/p_'.$id;
    }

}