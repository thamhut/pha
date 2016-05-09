<?php
namespace Module\Models;

use Phalcon\Mvc\Model;
use \Module\Frontend\Controllers\ControllerBase;
use Phalcon\Mvc\Model\Validator\Regex as RegexValidator;
use Phalcon\Mvc\Model\Validator\PresenceOf;
use Phalcon\Mvc\Model\Validator\Email as EmailValidator;
use Phalcon\Mvc\Model\Validator\Uniqueness as Uniqueness;
use Phalcon\Mvc\Model\Validator\StringLength;
use \Phalcon\Mvc\Model\Message as Message;

class User extends Model
{
    public $incode;
    public function initialize()
    {
    }
    public function getSource()
    {
        return "user_tb";
    }
    
    public function beforeValidation()
    {
        if(isset($this->username))
            $this->username = trim($this->username);
        if(isset($this->email))
            $this->email = trim($this->email);
        $this->date = date('Y-m-d H:i:s');
        if(!isset($this->core))
            $this->core = 500;
        if(!isset($this->group))
            $this->group = 2008;
        if(isset($this->fullname))
            $this->fullname = addslashes($this->fullname);
        $this->insert_date = $this->online_date = date('Y-m-d H:i:s');
        $this->total_like = $this->total_dislike = $this->group = $this->sex = 0;
        if(!isset($this->avata) && !$this->avata)
            $this->skipAttributes(array('avata'));
    }
    
    public function beforeSave()
    {
        if(!isset($this->core))
            $this->core = 500;
        if(!isset($this->group))
            $this->group = 2008;
    }
    
    public function validationRegister($user = null)
    {   
        $this->controllerBase = new ControllerBase;
        $this->validate(new StringLength(array(
            "field" => 'fullname',
            'max' => 100,
            'message' => $this->controllerBase->_getTranslation()->_('max_name'),
        )) ); 
        $this->validate(new PresenceOf(array(
            "field" => 'username',
            "message" => $this->controllerBase->_getTranslation()->_('not_empty'),
        )));  
        $this->validate(new RegexValidator(array(
            "field" => 'username',
            'pattern' => '/^[0-9 a-z A-Z \- \_ \.]+/',
            "message" => $this->controllerBase->_getTranslation()->_('username_invalid'),
        )));
        if(isset($user->username) && $this->username == isset($user->username))
        {
        }  
        else
        {
            $this->validate(new Uniqueness(array(
                "field" => 'username',
                "message" => $this->controllerBase->_getTranslation()->_('username_exist'),
            )));
        }
        
        $this->validate(new PresenceOf(array(
            "field" => 'password',
            "message" => $this->controllerBase->_getTranslation()->_('not_empty'),
        )));
        $this->validate(new StringLength(array(
            "field" => 'password',
            'min' => 6,
            'messageMinimum' => $this->controllerBase->_getTranslation()->_('min_pass'),
        )) ); 
        if (isset($this->password) && $this->password != $this->repassword && !isset($user)) {
            $this->appendMessage(new Message("The field doesn't have the right range of values", "repassword"));
            return false;
        }
        
        $this->validate(new PresenceOf(array(
            "field" => 'email',
            "message" => $this->controllerBase->_getTranslation()->_('not_empty'),
        ))); 
        $this->validate(new EmailValidator(array(
            "field" => 'email',
            "message" => $this->controllerBase->_getTranslation()->_('email_invalid'),
        )));
        if(isset($user->email) && $this->email == isset($user->email))
        {
        }  
        else
        {
            $this->validate(new Uniqueness(array(
                "field" => 'email',
                "message" => $this->controllerBase->_getTranslation()->_('email_exist'),
            )));
        }
        $this->validate(new PresenceOf(array(
            "field" => 'incode',
            "message" => $this->controllerBase->_getTranslation()->_('not_empty'),
        )));
        
        
        if ($this->validationHasFailed() == true) {
          return false;
        }
        return true;
    }
    
    public function validationLogin()
    {    
        $this->controllerBase = new ControllerBase;
        $this->validate(new RegexValidator(array(
            "field" => 'username',
            'pattern' => '/^[0-9 a-z A-Z - _ .]+/',
            "message" => $this->controllerBase->_getTranslation()->_('username_invalid'),
        )));
        
        if ($this->validationHasFailed() == true) {
          return false;
        }
        return true;
    }
    
    public function login()
    {
        $data = User::findFirst(array(
            "username = :username:",
            "bind"  => array(
                "username"  => $this->username,
            )
        ));
        if($data->password == md5($this->password))
        {
            return $data;
        }
        else
            return false;
    }
    
}