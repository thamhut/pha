<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use \Module\Models\BaseModel;
use Phalcon\Mvc\Model\Validator\Regex as RegexValidator;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength;
use \Phalcon\Mvc\Model\Message as Message;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;

class Music extends Model
{
    public $incode;
    public $category;
    public $content;
    public $link;
    public $point;
    public function initialize()
    {
        $this->belongsTo("id_cate", "Module\Models\Category", "id",array(
          'alias' => 'Category'
        ));
        $this->belongsTo("id_user", "Module\Models\User", "id",array(
          'alias' => 'User'
        ));
    }
    public function getSource()
    {
        return "music_tb";
    }
    
    public function getMusicByCate($idCate, $page, $numItem)
    {
        $page = $page - 1;
        $idCate = (int)$idCate;
        $query = array(
            'models' => array('Module\Models\Music'),
            'columns' => array('Module\Models\Music.poster', 'Module\Models\Music.id', 'Module\Models\Music.title','Module\Models\Music.play','Module\Models\User.username', 'Module\Models\Category.name', 'Module\Models\Music.id_user', 'Module\Models\Music.id_cate', 'IF(Module\Models\Music.count_choose=0,0,Module\Models\Music.count_point/Module\Models\Music.count_choose) AS point'),
            'order' => 'Module\Models\Music.date_sort DESC',
            'limit' => $numItem,
            'offset' => $page * $numItem,
        );
        
        $sql = new Sql($query); 
        $sql->where('Module\Models\Music.id_cate = '.$idCate);
        $sql->innerJoin('Module\Models\User', 'Module\Models\User.id = Module\Models\Music.id_user');
        $sql->innerJoin('Module\Models\Category', 'Module\Models\Category.id = Module\Models\Music.id_cate');
        $result = ($sql->getQuery());  
        return ($result->execute()->toArray());
    }
    
    public static function nhacsan_get_music_hot($date)
    {
        $result = self::find(array(
            'columns' => array('id', 'title', 'play'),
            'conditions' => 'date_sort >= :date:',
            'bind' => array('date' => $date),
            'order' => '(play*1 + download*10 + _like*7 + IF(count_choose=0,0,count_point/count_choose)*8 - dislike*4)/22 DESC',
            'limit' => 10,
        ));
        return ($result->toArray());
    } 
    
    public static function nhacsan_get_music_top($fdate, $tdate, $id)
    {
        $query = array(
            'models' => array('Module\Models\Music'),
            'columns' => array('Module\Models\Music.id', 'Module\Models\Music.title', 'Module\Models\Music.play', 'Module\Models\Music.poster', 'SUM(Module\Models\MusicDate.id)'),
            'order' => 'SUM(Module\Models\MusicDate.play) DESC',
            'group' => 'Module\Models\Music.id',
            'limit' => 10,
        );
        $sql = new Sql($query);
        $sql->innerJoin('Module\Models\MusicDate', 'Module\Models\MusicDate.id_music = Module\Models\Music.id');
        $sql->betweenWhere('Module\Models\MusicDate.date', $fdate, $tdate);
        if($id == 6)
        {
            $sql->where('Module\Models\Music.id_cate = '.$id);
        }
        else
        {
            $sql->where('Module\Models\Music.id_cate != 6');
        }
        $result = ($sql->getQuery());
        return ($result->execute()->toArray());
    }
    
    public function getlistMusicByCate($page, $numItem)
    {
        $page = $page - 1;
        $condition_count = "";
        $order = 'Module\Models\Music.date_sort DESC';
        $condition = $parameter = $parameter_count = array();
        if(isset($this->id_cate) && $this->id_cate)
        {
            $condition[] = "Module\Models\Music.id_cate = :cate: ";
            $condition_count .= "id_cate = :cate:";
            $parameter['cate'] = $this->id_cate;
        }
        if(isset($this->id_user) && $this->id_user)
        {
            $condition[] = "Module\Models\Music.id_user = :id_user: ";
            $condition_count .= "id_user = :id_user:";
            $parameter['id_user'] = $this->id_user;
        }
        if(isset($this->play) && $this->play)
        {
            $order = 'Module\Models\Music.play DESC';
        }
        if(isset($this->_like) && $this->_like)
        {
            $order = 'Module\Models\Music._like DESC';
        }
        if(isset($this->download) && $this->download)
        {
            $order = 'Module\Models\Music.download DESC';
        }
        $query = array(
            'models' => array('Module\Models\Music'),
            'columns' => array('Module\Models\Music.download','Module\Models\Music._like','Module\Models\Music.poster', 'Module\Models\Music.id', 'Module\Models\Music.title','Module\Models\Music.play','Module\Models\User.username', 'Module\Models\Category.name', 'Module\Models\Music.id_user', 'Module\Models\Music.id_cate', 'IF(Module\Models\Music.count_choose=0,0,Module\Models\Music.count_point/Module\Models\Music.count_choose) AS point'),
            'order' => $order,
            'limit' => $numItem,
            'offset' => $page * $numItem,
        );
        $sql = new Sql($query);
        $sql->innerJoin('Module\Models\User', 'Module\Models\User.id = Module\Models\Music.id_user');
        $sql->innerJoin('Module\Models\Category', 'Module\Models\Category.id = Module\Models\Music.id_cate');
        if(isset($this->id_cate))
        {
            $sql->where('Module\Models\Music.id_cate = '.$this->id_cate);
        }
        if(isset($this->id_user))
        {
            $sql->where('Module\Models\Music.id_user = '.$this->id_user);
        }
        $result = ($sql->getQuery());
        $baseModel = new BaseModel;
        $baseModel->items = $result->execute()->toArray();
        $baseModel->limit = $numItem;
        $baseModel->current = $page+1;
        $baseModel->total_items = Music::count(array(
            "conditions" => $condition_count,
            "bind"  => $parameter,
        )); 
        $baseModel->setPages() ; 
        return $baseModel;
    }
    
    public function beforeValidation()
    {
        $this->date_sort = date('Y-m-d H:i:s');
        $this->date = date('Y-m-d');
        $this->active = isset($this->active)?$this->active:'0';
        if(!isset($this->_like))
            $this->skipAttributes(array('_like')); 
        if(!isset($this->dislike))
            $this->skipAttributes(array('dislike'));
        if(!isset($this->play))
            $this->skipAttributes(array('play'));
        if(!isset($this->count_point))
            $this->skipAttributes(array('count_point'));
        if(!isset($this->count_choose))
            $this->skipAttributes(array('count_choose'));
        if(!isset($this->download))
            $this->skipAttributes(array('download'));
        if(isset($this->link))
            $this->url = addslashes ($this->link);
        if(isset($this->category))
            $this->id_cate = (int)$this->category;
        if(isset($this->content))
            $this->description = ($this->content);
    }
    
    public function beforeSave()
    {
        $this->title = addslashes ($this->title);
        if(isset($this->link))
            $this->url = addslashes ($this->link);
        if(isset($this->category))
            $this->id_cate = (int)$this->category;
        if(isset($this->content))
            $this->description = ($this->content);
    }
    
    public function validationMusic($music = null)
    {
        $this->validate(new PresenceOf(array(
            "field" => 'title',
            "message" => 'Tiêu đề không được trống',
        )));
        $this->validate(new PresenceOf(array(
            "field" => 'link',
            "message" => 'Link không được trống',
        )));
        $this->validate(new PresenceOf(array(
            "field" => 'category',
            "message" => 'Chuyên mục không được trống',
        ))); 
        $this->validate(new PresenceOf(array(
            "field" => 'content',
            "message" => 'Mô tả không được trống',
        )));
        $this->validate(new PresenceOf(array(
            "field" => 'incode',
            "message" => 'Chưa nhập mã xác nhận',
        )));  
        if ($this->validationHasFailed() == true) {
          return false;
        }
        return true;
    }
    
    public function nhacsan_delete_music($uid, $mid)
    {
        $sql = "CALL nhacsan_delete_music1('$uid', '$mid');";
        $result = $this->getReadConnection()->query($sql);
    }
    
}