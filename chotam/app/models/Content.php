<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use Phalcon\Paginator\Adapter\Model as PaginatorModel;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use \Module\Frontend\Controllers\ControllerBase;
use Phalcon\Mvc\Model\Validator\StringLength;
use \Phalcon\Mvc\Model\Message as Message;
use Phalcon\Mvc\Model\Validator\Numericality;

class Content extends Model
{
    public $giatien1;
    public $giatien2;
    public $sdt;
    public $email;
    public $yahoo;
    public $skype;

    public function getSource()
    {
        return "raovat_content";
    }

    public function getNewTop()
    {

        $content = Content::find(array(
            "conditions" => "LENGTH(img) > 0",
            "order" => "id DESC",
            "limit" => 10,
            "columns" => "id, title, img"
        ));
        if($content)
            return $content;
        else
            return array();
    }

    public function beforeSave()
    {
        if(!isset($this->date))
            $this->date = date('Y-m-d H:i:s');
        if(isset($this->sdt) || isset($this->email) || isset($this->yahoo) || isset($this->skype))
            $this->lienlac = $this->sdt.','.$this->email.','.$this->yahoo.','.$this->skype;
        if(isset($this->city) || $this->city == '')
            $this->city = '0';
    }

    public function beforeValidation()
    {
        if(!isset($this->date))
            $this->date = date('Y-m-d H:i:s');
        if(isset($this->sdt) || isset($this->email) || isset($this->yahoo) || isset($this->skype))
            $this->lienlac = $this->sdt.','.$this->email.','.$this->yahoo.','.$this->skype;
        if(isset($this->city) || $this->city == '')
            $this->city = '0';
    }

    public function validateCreate()
    {
        $this->controllerBase = new ControllerBase;

        $this->validate(new PresenceOf(array(
            "field" => 'title',
            "message" => $this->controllerBase->_getTranslation()->_('not_empty'),
        )));
        $key = array('cung_cau', 'user_type', 'muc_luong', 'kinh_nghiem', 'cu_moi', 'dien_tich', 'gia_tien', 'kieu_dang', 'xuat_su', 'hang_san_xuat', 'id_category', 'city');
        foreach($key as $item)
        {
            if(isset($this->item))
            {
                $this->validate(new Numericality(array(
                    "field" => $item,
                    "message" => $this->controllerBase->_getTranslation()->_('not_number'),
                )));
            }
        }
        if ($this->validationHasFailed() == true) {
            return false;
        }
        return true;
    }


    public function getall_content_hot($strcate)
    {
        $date_from = date( "Y-m-d", strtotime( "-10 month" ) );
        $date_to = date('Y-m-d');
        $conditions = "id_category IN (".$strcate.") AND date BETWEEN :fromDate: AND :toDate: ";
        //Parameters whose keys are the same as placeholders
        $parameters = array(
            "fromDate" => $date_from,
            "toDate"    => $date_to
        );
        $content = Content::find(array(
            "conditions"    =>  $conditions,
            "bind"  =>  $parameters,
            "order" =>  "view DESC",
            "limit" =>  10,
            'columns'   =>  'title, id, date, city, img' ,
        ));
        return $content;
    }

    public function getCateByIdlevel($idlevel, $page, $numItem)
    {
        $condition = "";
        $parameter = array();
        $condition .= " id_category IN (".$idlevel.") ";
        if(isset($this->cung_cau) && $this->cung_cau != 0)
        {
            $condition .= " AND cung_cau = :cung_cau: ";
            $parameter['cung_cau'] = $this->cung_cau;
        }
        if(isset($this->user_type) && $this->user_type!= 0)
        {
            $condition .= " AND user_type = :user_type: ";
            $parameter['user_type'] = $this->user_type;
        }
        if(isset($this->muc_luong) && $this->muc_luong != 0)
        {
            $condition .= " AND muc_luong = :muc_luong: ";
            $parameter['muc_luong'] = $this->muc_luong;
        }
        if(isset($this->kinh_nghiem) && $this->kinh_nghiem != 0)
        {
            $condition .= " AND kinh_nghiem = :kinh_nghiem: ";
            $parameter['kinh_nghiem'] = $this->kinh_nghiem;
        }
        if(isset($this->cu_moi) && $this->cu_moi != 0)
        {
            $condition .= " AND cu_moi = :cu_moi: ";
            $parameter['cu_moi'] = $this->cu_moi;
        }
        if(isset($this->dien_tich) && $this->dien_tich != 0)
        {
            $condition .= " AND dien_tich = :dien_tich: ";
            $parameter['dien_tich'] = $this->dien_tich;
        }
        if(isset($this->giatien1) && $this->giatien1 != 0)
        {
            $condition .= " AND gia_tien >= :gia_tien1: ";
            $parameter['gia_tien1'] = $this->giatien1;
        }
        if(isset($this->giatien2) && $this->giatien2 != 0)
        {
            $condition .= " AND gia_tien <= :gia_tien2: ";
            $parameter['gia_tien2'] = $this->giatien2;
        }
        if(isset($this->kieu_dang) && $this->kieu_dang != 0)
        {
            $condition .= " AND kieu_dang = :kieu_dang: ";
            $parameter['kieu_dang'] = $this->kieu_dang;
        }
        if(isset($this->xuat_su) && $this->xuat_su != 0)
        {
            $condition .= " AND xuat_su = :xuat_su: ";
            $parameter['xuat_su'] = $this->xuat_su;
        }
        if(isset($this->hang_san_xuat) && $this->hang_san_xuat != 0)
        {
            $condition .= " AND hang_san_xuat = :hang_san_xuat: ";
            $parameter['hang_san_xuat'] = $this->hang_san_xuat;
        }
        if(isset($this->city) && $this->city != 0)
        {
            $condition .= " AND city = :city: ";
            $parameter['city'] = $this->city;
        }
        if(isset($this->id_user) && $this->id_user != 0)
        {
            $condition .= " AND id_user = :id_user: ";
            $parameter['id_user'] = $this->id_user;
        }
        $data = Content::find(array(
            "conditions" => $condition,
            "bind"  => $parameter,
            "limit" => $numItem,
            "offset" => ($page-1)*$numItem,
            'order' =>  'date desc',
            'columns'   =>  'title, id, date, city, img' ,
        ));
        $result = new \Module\Models\BaseModel;
        $result->items = $data->toArray();
        $result->limit = $numItem;
        $result->current = $page;
        $result->total_items = Content::count(array(
            "conditions" => $condition,
            "bind"  => $parameter,
        ));
        $result->setPages() ;
        return $result;
    }

    public function getRank($date)
    {
        $content = Content::count(array(
            "conditions" => " date > \"".$date."\""
        ));
        return $content;
    }
}