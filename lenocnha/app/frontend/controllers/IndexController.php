<?php
namespace Module\Frontend\Controllers; 

use \Module\Models\Music;
use \Module\Models\MusicDate;
use \Module\Models\UserActionMusic;
use \Phalcon\Mvc\Model\Query\Builder as Sql;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->tag->appendTitle('');
        if ($this->request->isAjax()) 
        {
            $this->view->setRenderLevel('action');
        }
    }
    
    public function indexAction()
    {
        $data = array();
        $music = new Music;
        $data['nonstop'] = $nonstop = $music->getMusicByCate(1,1,10);
        $data['remix'] =  $music->getMusicByCate(2,1,10);
        $data['electtronic_house'] = $music->getMusicByCate(3,1,10);
        $data['producer_vn'] = $producer_vn = $music->getMusicByCate(4,1,10);
        $data['dance_trance'] =  $music->getMusicByCate(5,1,10);
        $data['video'] = $music->getMusicByCate(6,1,10);
        $this->view->data = $data;
        $this->view->meta_title = $this->view->meta_content = ''; 
    }
    
    public function categoryAction()
    {
        $data = array(); 
        $music = new Music;
        $music->id_cate = $data['id'] = $id = (int)$this->dispatcher->getParam('id');
        if($id)
        {
            $data['page'] = $page = isset($_GET['page']) && $_GET['page']? (int)$_GET['page']:1;
            $music->play = $data['play'] = isset($_GET['play']) && $_GET['play']? (int)$_GET['play']:0;
            $music->_like = $data['like'] = $data['_like'] = isset($_GET['like']) && $_GET['like']? (int)$_GET['like']:0;
            $music->download = $data['download'] = isset($_GET['download']) && $_GET['download']? $_GET['download']:0;
            $data['data_content'] = $data_content = $music->getlistMusicByCate($page, 30);
            $data['lst_item_content'] = $data_content->items;
            $data['_url'] = $_GET['_url'];
            $data['url'] = '?v=0'.($music->play?'&play=1':'').($music->_like?'&like=1':'').($music->download?'&download=1':'');
            $this->view->data = $data;
            $this->view->meta_title = $this->view->meta_content = ''; 
        }
        else
        {
            $this->response->redirect('error');
        }
    }
    
    public function detailAction()
    {   
        $data = array(); 
        $data['id'] = $id = $this->dispatcher->getParam('id');
        $music = Music::findFirstById($id);
        $music->play = $music->play + 1;
        $music->save();
        $music->point = $music->count_choose == 0 ? 0 : ($music->count_point/$music->count_choose);
        $random_keys=array_rand(array(1,2,3,4,5,6),1);
        $music_o = new Music;
        $data['add_music'] = $music_o->getMusicByCate($random_keys,1,10);
        $musicDate = MusicDate::findFirst(array(
            "conditions" => "id_music = :id: AND date = :date: ",
            "bind"       => array('id' => $id, 'date' => date('Y-m-d'))
        ));  
        if($musicDate)
        {
            $musicDate->play = $musicDate->play + 1;
            $musicDate->save();
        }
        else
        {
            $musicDate = new MusicDate;
            $musicDate->id_music = $id;
            $musicDate->date = date('Y-m-d');
            $musicDate->play = 1;
            $musicDate->save(); 
        }
        if(!$music)
        {
             $this->response->redirect('error');
        }
        $this->view->music = $music;
        $this->view->data = $data;
        $this->view->meta_title = $this->view->meta_content = isset($music->title)?(strip_tags($music->title)):'';
    }
    
    function actionAction()
    {   
        $id_user = isset($this->user_session['id'])?$this->user_session['id']:'';
        $id_user_choose = $this->utils->getRealIPAddress();
        $type = isset($_POST['type'])? $_POST['type']:'';
        $id = isset($_POST['id'])? $_POST['id']:'';
        $value = isset($_POST['value'])? $_POST['value']:'';
        if($type == '_like' || $type == 'dislike')
        {   
            if($id_user)
            {   
                $result = UserActionMusic::nhacsan_update_music_type($id, $type, $value, $id_user); 
                echo $result['id'];
                return;
            }
            else
            {
                echo '-1';
                return;
            }
        }
        if($type == 'download')
        {
            $result = UserActionMusic::nhacsan_update_music_type($id, $type, $value, 0);
            echo $result['id'];
            return;
        }
        if($type == 'choose_point')
        {
            $result = UserActionMusic::nhacsan_update_music_type($id, $type, $value, $id_user_choose);
            echo $result['id'];
            return;
        }
    }
    
    function hotAction()
    {
        $date1 = time();
        $date2 = date('Y-m-d', ($date1 - 2592000));
        $this->view->hot_music = Music::nhacsan_get_music_hot($date2);
    }

    function topAction()
    {
        $date1 = time();
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


    public function sitemapAction()
    {
        set_time_limit(0);
        $start = array(1);
        foreach($start as $v){
            $query = array(
                'models' => array('Module\Models\Music'),
                'columns' => array('Module\Models\Music.id', 'Module\Models\Music.title'),
                'order' => 'Module\Models\Music.id ASC',
                'limit' => 50000,
                'offset' => $v,
            );

            $sql = new Sql($query);
            $result = ($sql->getQuery());
            $data = ($result->execute()->toArray());
            $xmldoc = new \DOMDocument('1.0','');
            $xmldoc->formatOutput = true;

            // create root nodes
            $root = $xmldoc->createElement("urlset");
            $root->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
            $root->setAttribute('xmlns:xsi','http://www.w3.org/2001/XMLSchema-instance');
            $root->setAttribute('xsi:schemaLocation','http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');

            $xmldoc->appendChild($root);
            foreach($data as $item)
            {
                $title_convert = $this->utils->converToUrl($item['title']);
                $elem = $xmldoc->createElement("url");

                //
                $loc = 'http://lenocnha.com/detail/'.$title_convert.'_i'.$item['id'].'.html';
                $fname = $xmldoc->createElement("loc");
                $fname->appendChild($xmldoc->createTextNode($loc));
                $elem->appendChild( $fname );
                //
                $lastmod = date('Y-m-d').'T00:00:00+07:00';
                $lname = $xmldoc->createElement("lastmod");
                $lname->appendChild($xmldoc->createTextNode($lastmod));
                $elem->appendChild($lname);
                //
                //
                $priority = '0.5';
                $_4priority = $xmldoc->createElement("priority");
                $_4priority->appendChild($xmldoc->createTextNode($priority));
                $elem->appendChild($_4priority);

                //create end root nodes
                $root->appendChild($elem);
                // create element nodes
            }
            //save file
            $xmldoc->save(__DIR__."/../../../sitemap_detail.xml") ;
        }
        die;

    }
    
}