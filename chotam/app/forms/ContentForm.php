<?php
namespace Chotam\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Module\Frontend\Controllers\ControllerBase;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use \Module\Models\Category;

Class ContentForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $controller = new ControllerBase;
        $title = new Text('title', array(
            'placeholder' => $controller->_getTranslation()->_('title_placeholder')
        ));
        $this->add($title);
        
        $content = new TextArea('content', array(
            'placeholder' => $controller->_getTranslation()->_('content_placeholder')
        ));
        $this->add($content);
        
        $img = new File('img');
        $this->add($img);
        
        $city = array();
        for($i=0; $i<100; $i++)
        {
            $ms = $this->utils->getCity($i);
            if($ms)
            {
                $city[$i] = $ms;
            }
        }
        $this->add(new Select("city", $city));
        
        $gia_tien = new Text('gia_tien', array(
             'placeholder' => $controller->_getTranslation()->_('giatien_placeholder')
        ));
        $this->add($gia_tien);
        
        $cung_cau = new Select('cung_cau', array(
             $controller->_getTranslation()->_('cung_cau_placeholder') ,
             $controller->_getTranslation()->_('cung') ,
             $controller->_getTranslation()->_('cau') ,
        ));
        $this->add($cung_cau);
        
        $nguoi_dang = new Select('nguoi_dang', array(
             $controller->_getTranslation()->_('nguoi_dang_placeholder'),
             $controller->_getTranslation()->_('ca_nhan'),
             $controller->_getTranslation()->_('doanh_nghiep'),
        ));
        $this->add($nguoi_dang);
        
        $this->add(new Select("muc_luong", array(
            $controller->_getTranslation()->_('muc_luong_placeholder'),
            $controller->_getTranslation()->_('duoi_3_trieu'),
            $controller->_getTranslation()->_('3_5_trieu'),
            $controller->_getTranslation()->_('5_7_trieu'),
            $controller->_getTranslation()->_('7_10_trieu'),
            $controller->_getTranslation()->_('10_15_trieu'),
            $controller->_getTranslation()->_('15_20_trieu'),
            $controller->_getTranslation()->_('20_30_trieu'),
            $controller->_getTranslation()->_('tren_30_trieu'),
        )));
        
        $this->add(new Select("kinh_nghiem", array(
            $controller->_getTranslation()->_('kinh_nghiem_placeholder'),
            $controller->_getTranslation()->_('duoi_1_nam'),
            $controller->_getTranslation()->_('1_nam'),
            $controller->_getTranslation()->_('2_nam'),
            $controller->_getTranslation()->_('3_nam'),
            $controller->_getTranslation()->_('4_nam'),
            $controller->_getTranslation()->_('5_nam'),
            $controller->_getTranslation()->_('tren_5_nam'),
        )));
        
        $tinh_trang = new Select('tinh_trang', array(
             $controller->_getTranslation()->_('tinh_trang_placeholder'),
             $controller->_getTranslation()->_('cu'),
             $controller->_getTranslation()->_('moi'),
        ));
        $this->add($tinh_trang);
        
        $this->add(new Select("dien_tich", array(
            $controller->_getTranslation()->_('dien_tich_placeholder'),
            $controller->_getTranslation()->_('duoi_50'),
            $controller->_getTranslation()->_('50_70'),
            $controller->_getTranslation()->_('70_100'),
            $controller->_getTranslation()->_('100_150'),
            $controller->_getTranslation()->_('150_200'),
            $controller->_getTranslation()->_('200_300'),
            $controller->_getTranslation()->_('300_500'),
            $controller->_getTranslation()->_('500_1500'),
            $controller->_getTranslation()->_('1500_2000'),
            $controller->_getTranslation()->_('tren_2000'),
        )));
        
        $this->add(new Select("kieu_dang", array(
            $controller->_getTranslation()->_('kieu_dang_placeholder'),
            $controller->_getTranslation()->_('kieu_xoay'),
            $controller->_getTranslation()->_('kieu_dung'),
            $controller->_getTranslation()->_('nap_gap'),
            $controller->_getTranslation()->_('cam_ung'),
            $controller->_getTranslation()->_('nap_truot'),
        )));
        
        $this->add(new Select("xuat_xu", array(
            $controller->_getTranslation()->_('xuat_xu_placeholder'),
            $controller->_getTranslation()->_('trong_nuoc'),
            $controller->_getTranslation()->_('nhat_ban'),
            $controller->_getTranslation()->_('han_quoc'),
            $controller->_getTranslation()->_('trung_quoc'),
            $controller->_getTranslation()->_('my'),
        )));
        
        $this->add(new Select("hang_san_xuat", array(
            $controller->_getTranslation()->_('hang_san_xuat_placeholder'),
            $controller->_getTranslation()->_('Yamaha'),
            $controller->_getTranslation()->_('Piaggio'),
            $controller->_getTranslation()->_('SYM'),
            $controller->_getTranslation()->_('Nissan'),
            $controller->_getTranslation()->_('Toyota'),
            $controller->_getTranslation()->_('Mercedes-Benz'),
            $controller->_getTranslation()->_('Mazda'),
            $controller->_getTranslation()->_('KIA'),
            $controller->_getTranslation()->_('Isuzu'),
            $controller->_getTranslation()->_('Hyundai'),
            $controller->_getTranslation()->_('GM Daewoo'),
            $controller->_getTranslation()->_('Ford'),
            $controller->_getTranslation()->_('FIAT'),
            $controller->_getTranslation()->_('BMW'),
            $controller->_getTranslation()->_('Honda'),
            $controller->_getTranslation()->_('Suzuki'),
        )));
        
        $sdt = new Text('sdt', array(
             'placeholder' => $controller->_getTranslation()->_('sdt_placeholder')
        ));
        $this->add($sdt);
        
        $yahoo = new Text('yahoo', array(
             'placeholder' => $controller->_getTranslation()->_('yahoo_placeholder')
        ));
        $this->add($yahoo);
        
        $email = new Text('email', array(
             'placeholder' => $controller->_getTranslation()->_('Email')
        ));
        $this->add($email);
        $skype = new Text('skype', array(
             'placeholder' => $controller->_getTranslation()->_('Skype')
        ));
        $this->add($skype);
        
        $incode = new Text('incode');
        $this->add($incode);
        
        $category_data = new Category;
        $category_data = $category_data->getAll();
        $cateArr = array();
        $nameArr = array();
        $cateSelect = array();
        foreach($category_data as $icate)
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
        $id_category = new Select('id_category', $cateSelect);
        $this->add($id_category);
    }
}