<?php
namespace Module\Frontend\Controllers;

use Module\Models\Content;
use Module\Models\Category;
use \Module\Models\User;
use \Phalcon\Mvc\Model\Query\Builder as Sql;


class IndexController extends ControllerBase
{
    public $title;
    public function initialize()
    {
        parent::initialize();
        $this->tag->appendTitle('');
        if ($this->request->isAjax())
        {
            $this->view->setRenderLevel('load_hot_news');
        }
    }

    public function indexAction()
    {
        $this->title = $this->_getTranslation()->_("Home");
        if(checkDevice() == 0 || ($this->session->get('language') == 'en'))
        {
            $this->assets
                ->addJs('public/js/scrollable.js');
            $this->assets
                ->addJs('public/js/scrollable.navigator.js');
            $this->assets
                ->addJs('public/js/scrollable.autoscroll.js');
            $this->assets
                ->addJs('public/js/liquidmetal.js');
            $this->assets
                ->addJs('public/js/jquery.flexselect.js');
            $this->assets
                ->addCss('public/css/flexselect.css');
            $this->assets
                ->addCss('public/css/scrollable_2.css');
        }
        $content_data = new Content;
        $this->view->content_data = $content_data->getNewTop();
        $this->flash->success('aaa');
    }

    public function load_hot_newsAction()
    {
        $data = array();
        $cate = $this->category_data;

        $rand = rand(0, 97);
        $lstcate = ($cate[$rand]);
        $strcate = '';
        if($lstcate->id==0)
        {
            $strcate = $lstcate = $lstcate->id_level;
            foreach($cate as $icate)
            {
                if($icate->id==$lstcate)
                {
                    $strcate .= ','.$icate['id_level'];
                }
            }
        }
        else
        {
            $strcate = $lstcate = $lstcate->id;
            foreach($cate as $icate)
            {
                if($icate->id == $lstcate)
                {
                    $strcate .= ','.$icate['id_level'];
                }
            }
        }
        $contentO = new Content;
        $contentData = $contentO->getall_content_hot($strcate);

        $result = array();
        foreach($contentData as $k=>$icontent)
        {
            $result[$k]['url'] = $this->url->get('detail/'.$this->utils->converToUrl($icontent->title).'_i'.$icontent->id);
            $result[$k]['title'] = $this->utils->enhtml($icontent->title);
            $result[$k]['img'] = $icontent->img;
        }
        echo json_encode($result);
    }

    public function categoryAction()
    {
        $data = array();
        $data['filter'] = $filter = isset($_GET['filter']) ? $_GET['filter']:'';
        $arrfilter = array();
        $arrfilter = explode('a',$filter);
        $lstfilter = array();
        $key = array('cung_cau', 'user_type', 'muc_luong', 'kinh_nghiem', 'cu_moi', 'dien_tich', 'giatien1', 'giatien2', 'kieu_dang', 'xuat_su', 'hang_san_xuat');
        $content = new Content;
        for($i = 0; $i<11; $i++)
        {
            $content->$key[$i] = $lstfilter[$i] = isset($arrfilter[$i])&&$arrfilter[$i]!=''?$arrfilter[$i]:0;
        }
        $data['filter'] = $lstfilter;
        $category = new Category;
        $category->id_level = $data['id'] = $id = $this->dispatcher->getParam('id');
        $category_data = $category->search();
        $lstCate = $category_data[0]['id_level'];
        if(isset($category_data[0]['id']))
        {
            if($category_data[0]['id'] == 0)
            {
                $category = new Category;
                $category->id = $category_data[0]['id_level'];
                $lst_cate_data = $category->search();
                foreach($lst_cate_data as $i)
                {
                    $lstCate .= ','.$i['id_level'];
                }
            }
            else
            {
                $lstCate = $id;
            }
            $data['category_data'] = $category_data[0];
            $data['page'] = $cPage = isset($_GET['page']) && $_GET['page'] ? $_GET['page'] : 1;

            $content->city = isset($this->user_session['city']['ms_city']) ? $this->user_session['city']['ms_city'] : 0;
            $data['data_content'] = $data_content = $content->getCateByIdlevel($lstCate, $cPage, 30);
            $data['lst_item_content'] = $data_content->items;
            $data['content_hot'] = $content->getall_content_hot($lstCate);
            $data['url'] = $_GET['_url'].'?v=0';
            $data['url'] .= $filter ? '&filter='.$filter:'';
            $this->view->data = $data;
        }
        else
        {
            $this->dispatcher->forward(array(
                "controller" => "error",
                "action" => "index"
            ));
        }

    }

    public function detailAction()
    {
        $data = array();
        $data['id'] = $id = $this->dispatcher->getParam('id');
        $data['data_content'] = Content::findFirst(array(
            "id = ".$id,
            "columns" => "id_category,date,title,city, lienlac,id_user,id,img,warning,content"
        ));
        if($data['data_content'] != false)
        {
            $category = new Category;
            $category->id_level = $data['data_content']->id_category;
            $category_data = $category->search();
            $data['category'] = isset($category_data[0])?$category_data[0]:'';
            $category->id_level = null;
            $category->id = $category_data[0]['id'];
            $lstCate = $category_data[0]['id'];
            $lst_cate_data = $category->search();
            foreach($lst_cate_data as $i)
            {
                $lstCate .= ','.$i['id_level'];
            }
            $content = new Content;
            $data['content_in_cate'] = $content->getCateByIdlevel($lstCate, 1, 10);
            $data['content_hot'] = $content->getall_content_hot($lstCate);
            $data['rank'] = $content->getRank($data['data_content']->date);
            $this->view->data = $data;
        }
        else
        {
            $this->response->redirect();
        }

    }

    public function choise_cityAction()
    {
        $data = array();
        $url = $_GET['url']?$_GET['url']:$this->url->get('/');
        $city = $_GET['city'];
        if(isset($user))
        {
            $data = $user;
        }
        $data['city']['ms_city'] = $city;
        $data['city']['name_city'] = $this->utils->getCity($city);

        $this->session->set("user", $data);
        $this->response->redirect($url);
    }

    public function update_rankAction()
    {
        $id_content = $_GET['id']?$_GET['id']:0;
        $id_user = $_GET['id_user']?$_GET['id_user']:0;
        if($id_content && $id_user)
        {
            $content_data = Content::findFirstById($id_content);
            $user_data = User::findFirstById($id_user);
            if($content_data != false)
            {
                if($content_data->id_user == $user_data->id)
                {
                    if($user_data->core >= 5)
                    {
                        $content_data->date = date('Y-m-d H:i:s');
                        $user_data->core = $user_data->core - 5;
                        $content_data->save();
                        $user_data->save();
                        echo $this->_getTranslation()->_('update_rank_success',  array("core" => $user_data->core));
                        return;
                    }
                    else
                    {
                        echo $this->_getTranslation()->_('not_access');
                        return;
                    }
                }
                else
                {
                    echo $this->_getTranslation()->_('not_access');
                    return;
                }
            }
            else
            {
                echo $this->_getTranslation()->_('content_not_exist');
                return;
            }
        }
        else
        {
            echo $this->_getTranslation()->_('not_access');
            return;
        }
    }

    function update_warningAction()
    {
        $id = $_POST['id']? $_POST['id']:0;
        if($id != 0)
        {
            $content_data = Content::findFirstById($id);
            if($content_data != false)
            {
                $content_data->warning = 1;
                if($content_data->save())
                {
                    echo $this->_getTranslation()->_('thank_report');
                    return;
                }
                else
                {
                    echo $this->_getTranslation()->_('not_update');
                    return;
                }
            }
            else
            {
                echo $this->_getTranslation()->_('content_not_exist');
                return;
            }
        }
        else
        {
            echo $this->_getTranslation()->_('not_access');
        }
    }

    public function languageAction()
    {
        if(isset($_GET['l']))
        {
            if($_GET['l'] == 'vn')
            {
                $this->session->set('language','vn');
                $this->response->redirect();
            }
            else
            {
                $this->session->set('language','en');
                $this->response->redirect();
            }
        }
        else
        {
            $this->response->redirect('error');
        }
    }

    public function select_langAction()
    {
        if(isset($_GET['l']))
        {
            $url =  isset($_GET['url'])? $_GET['url']:'';
            $this->session->set('language',$_GET['l']);
            $this->response->redirect($url);
        }
        else
        {
            $this->response->redirect('error');
        }
    }

    public function sitemapAction()
    {
        set_time_limit(0);
        $start = array(50000);
        foreach($start as $v){
            $query = array(
                'models' => array('Module\Models\Content'),
                'columns' => array('Module\Models\Content.id', 'Module\Models\Content.title'),
                'order' => 'Module\Models\Content.id ASC',
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
                $loc = 'http://chotam.info/detail/'.$title_convert.'_i'.$item['id'].'.html';
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
            $xmldoc->save(__DIR__."/../../../sg_sitemap_".$v.".xml") ;
        }
        die;

    }

    function sg_getall_news_by_month()
    {
        $start = array(250000);
        foreach($start as $v){
            $query = array(
                'models' => array('Module\Models\Content'),
                'columns' => array('Module\Models\Content.id', 'Module\Models\Content.title'),
                'order' => 'Module\Models\Content.id ASC',
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
                $loc = 'http://chotam.info/detail/'.$title_convert.'_i'.$item['id'].'.html';
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
            $xmldoc->save(__DIR__."/../../../sg_sitemap_".$v.".xml") ;
        }

    }

}