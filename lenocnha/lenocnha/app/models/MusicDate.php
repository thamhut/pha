<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use \Phalcon\Mvc\Model\Query\Builder as Sql;
use Phalcon\Mvc\Model\Query;

class MusicDate extends Model
{
    public function initialize()
    {
        
    }
    public function getSource()
    {
        return "music_date_tb";
    }
    
    public function beforeValidation()
    {
        if(!isset($this->id_music))
            $this->skipAttributes(array('id_music')); 
        if(!isset($this->date))
            $this->skipAttributes(array('date'));
        if(!isset($this->_like))
            $this->skipAttributes(array('_like'));
        if(!isset($this->count_point))
            $this->skipAttributes(array('count_point'));
        if(!isset($this->count_choose))
            $this->skipAttributes(array('count_choose'));
        if(!isset($this->download))
            $this->skipAttributes(array('download'));
        if(!isset($this->dislike))
            $this->skipAttributes(array('dislike'));
        if(!isset($this->play))
            $this->skipAttributes(array('play'));
    }
    public function beforeSave()
    {
        if(!isset($this->id_music))
            $this->skipAttributes(array('id_music')); 
        if(!isset($this->date))
            $this->skipAttributes(array('date'));
        if(!isset($this->_like))
            $this->skipAttributes(array('_like'));
        if(!isset($this->count_point))
            $this->skipAttributes(array('count_point'));
        if(!isset($this->count_choose))
            $this->skipAttributes(array('count_choose'));
        if(!isset($this->download))
            $this->skipAttributes(array('download'));
        if(!isset($this->dislike))
            $this->skipAttributes(array('dislike'));
        if(!isset($this->play))
            $this->skipAttributes(array('play'));
    } 
}