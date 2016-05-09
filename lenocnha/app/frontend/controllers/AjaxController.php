<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 3/10/2016
 * Time: 9:59 AM
 */

namespace Module\Frontend\Controllers;

use \Module\Models\Category;
use \Module\Models\TopUser;
use \Module\Models\Music;

class AjaxController extends \Phalcon\Mvc\Controller
{


    public function hotdesktopAction(){
        $date1 = time();
        $date2 = date('Y-m-d', ($date1 - 2592000));
        $hot_music = Music::nhacsan_get_music_hot($date2);
        $i=0;
        $html = '';
        foreach($hot_music as $ihot)
        {
            $i++;
            $html .= '<div id="item_lst_right">';
            $html .= '<div class="'. (($i==1)? 'top1':($i==2? 'top2': 'top3') ).'" style="margin: 5px 10px 0 0 !important;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;">'. $i .'</div>';
            $html .= '<div  style="float: left; width: 200px;">';
            $html .= '<a title="'. $ihot['title'].'" target="_blank" href="'. $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'.'"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;">'. $ihot['title'].'</h3></a>';
            $html .= '<p style="font-size: 10px;">Lượt xem: '. $ihot['play'].'</p>';
            $html .= '</div> <div class="clear"></div> </div>';

        }
        echo $html;
        exit;
    }

    public function topdesktopAction(){
        $date1 = time();
        $fdate1 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 604800));
        $fdate2 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 2592000));
        $fdate3 = isset($_GET['fdate']) && $_GET['fdate']?$_GET['fdate']:date('Y-m-d', ($date1 - 31536000));
        $tdate = isset($_GET['tdate']) && $_GET['tdate']?$_GET['tdate']:date('Y-m-d', $date1);
        if(isset($_POST['show']) && isset($_POST['music']) && !isset($_POST['video'])){
            $html = '<div class="fillter_date"><a id="showhot1"  onclick="show_hot(\'1\',this);">Tuần</a> | <a id="showhot2" onclick="show_hot(\'2\',this);">Tháng</a> | <a id="showhot3" onclick="show_hot(\'3\',this);">Năm</a></div>';
            $show = $_POST['show'];
            $html .= '<div id='.$show.'"_hot_box" class="hot_box ">';
            $fdate = (int)$show == 1?$fdate1:((int)$show == 2?$fdate2:((int)$show == 3)?$fdate3:$fdate1);
            $top_music = Music::nhacsan_get_music_top($fdate, $tdate, 0);
            $i = 0;
            foreach($top_music as $ihot)
            {
                $i++;
                $html .= '<div id="item_lst_right">';
                $html .= '<div class="'. (($i==1)? 'top1':($i==2? 'top2': 'top3') ).'" style="margin: 5px 10px 0 0 !important;float:left;height: 18px; width: 18px; border-radius: 9px; background: none repeat scroll 0% 0% rgb(95, 95, 95); text-align: center;">'. $i .'</div>';
                $html .= '<div  style="float: left; width: 200px;">';
                $html .= '<a title="'. $ihot['title'].'" target="_blank" href="'. $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'.'"><h3 style="font-size: 11px; max-height: 35px; overflow: hidden;">'. $ihot['title'].'</h3></a>';
                $html .= '<p style="font-size: 10px;">Lượt xem: '. $ihot['play'].'</p>';
                $html .= '</div> <div class="clear"></div> </div>';
            }
            echo $html;
        }
        if(isset($_POST['show']) && isset($_POST['video']) && !isset($_POST['music'])){
            $html = '<div class="fillter_date"><a id="showvideo1"  onclick="show_video(\'1\',this);">Tuần</a> | <a id="showvideo2" onclick="show_video(\'2\',this);">Tháng</a> | <a id="showvideo3" onclick="show_video(\'3\',this);">Năm</a></div>';
            $html .= '<div id='.$show.'"_video_box" class="video_box ">';
            $show = $_POST['show'];
            $fdate = (int)$show == 1?$fdate1:((int)$show == 2?$fdate2:((int)$show == 3)?$fdate3:$fdate1);
            $top_music = Music::nhacsan_get_music_top($fdate, $tdate, 6);
            $i = 0;
            foreach($top_music as $ihot)
            {
                $i++;
                $html .= '<div id="item_lst_right">';
                $html .= '<a title="'. $ihot['title'].'" target="_blank" href="'. $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'.'">';
                $html .= '<img alt="'. $ihot['title'].'" src="'. $ihot['poster'].'" style="height: 70px; width: 70px;">';
                $html .= '</a><div  style="float: right; width: 170px;">';
                $html .= '<h3 style="font-size: 11px; height: 50px; overflow: hidden;"><a title="'. $ihot['title'].'" target="_blank" href="'. $this->url->get('detail/'.$this->utils->converToUrl($ihot['title']).'_i'.$ihot['id']).'.html'.'">'. $ihot['title'].'</a></h3>';
                $html .= '<p style="font-size: 10px;">Lượt xem: '. $ihot['play'].'</p></div><div class="clear"></div></div>';
            }
            echo $html;
        }
        exit;
    }
}