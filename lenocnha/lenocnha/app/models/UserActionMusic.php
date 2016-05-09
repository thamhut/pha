<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use Phalcon\Mvc\Model\Query;

class UserActionMusic extends Model
{
    public function initialize()
    {
        
    }
    public function getSource()
    {
        return "user_action_music";
    }
    
    public function beforeValidation()
    {
        if(!isset($this->id_music))
            $this->skipAttributes(array('id_music')); 
        if(!isset($this->id_user))
            $this->skipAttributes(array('id_user'));
        if(!isset($this->type))
            $this->skipAttributes(array('type'));
    } 
    
    public static function nhacsan_update_music_type($id, $type, $value, $id_user_choose)
    {
        $sql = "CALL nhacsan_update_music_type1('$id', '$type', '$value', '$id_user_choose');";
        $music = new UserActionMusic;
        $result = $music->getReadConnection()->query($sql)->fetch();
        return $result;
    }
}