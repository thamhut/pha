<?php
namespace Module\Frontend\Controllers; 

use \Module\Models\Music;
use \Module\Models\MusicDate;
use \Module\Models\UserActionMusic;

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
    }
    
    function topAction()
    {
    }
    
}