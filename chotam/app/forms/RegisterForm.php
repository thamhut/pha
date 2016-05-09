<?php
namespace Chotam\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Validation\Validator\Regex as RegexValidator;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\Email as EmailValidator;
use Phalcon\Validation\Validator\Uniqueness as Uniqueness;
use Phalcon\Forms\Element\Password;
use Phalcon\Validation\Validator\StringLength;
use Phalcon\Validation\Validator\Confirmation;
use Module\Frontend\Controllers\ControllerBase;

Class RegisterForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $controller = new ControllerBase;
        
        // In edition the id is hidden
        if (isset($options['edit']) && $options['edit']) {
            $id = new Hidden('id');
            $this->add($id);
        }
        
        
        $username = new Text('username', array(
            'placeholder' => $controller->_getTranslation()->_('username')
        ));
        $username->addValidators(array(
            new PresenceOf(array(
                'message' => $controller->_getTranslation()->_('not_empty'),
            )),
            
            new RegexValidator(array(
                'pattern' => '/^[0-9 a-z A-Z - _ .]+/',
                "message" => $controller->_getTranslation()->_('username_invalid'),
            )),
            
            new Uniqueness(array(
                "message" => $controller->_getTranslation()->_('username_exist'),
            ))
        ));
        $this->add($username);
        
        $password = new Password('password', array(
            'placeholder' => $controller->_getTranslation()->_('password')
        ));
        $password->addValidators(array(
            new PresenceOf(array(
                "message" => $controller->_getTranslation()->_('not_empty'),
            )),
            new StringLength(array(
                'min' => 6,
                'message' => $controller->_getTranslation()->_('min_pass'),
            ))
        ));
        $this->add($password);
        
        $repassword = new Password('repassword', array(
            'placeholder' => $controller->_getTranslation()->_('repass')
        ));
        $repassword->addValidators(array(
            new PresenceOf(array(
                "message" => $controller->_getTranslation()->_('not_empty'),
            )),
            new Confirmation(array(
               'message' => $controller->_getTranslation()->_('pass_not_equal'),
               'with' => 'password'
            ))
        ));
        $this->add($repassword);
        
        $oldPassword = new Password('oldPassword', array(
            'placeholder' => $controller->_getTranslation()->_('old_password')
        ));
        $this->add($oldPassword);
        
        $email = new Text('email', array(
            'placeholder' => 'Email'
        ));
        $email->addValidators(array(
            new PresenceOf(array(
                'message' => $controller->_getTranslation()->_('not_empty'),
            )),
            new EmailValidator(array(
                'message' => $controller->_getTranslation()->_('email_invalid'),
            )),
            new Uniqueness(array(
                "message" => $controller->_getTranslation()->_('email_exist'),
            ))
        ));
        $this->add($email);
        
        $incode = new Text('incode');
        $incode->addValidators(array(
            new PresenceOf(array(
                'message' => $controller->_getTranslation()->_('not_empty'),
            )), 
        ));
        $this->add($incode);
        
        $namecode = new Hidden('namecode');
        $this->add($namecode);
        
    }
    
    /**
     * Prints messages for a specific element
     */
    public function messages($name)
    {
        print_r($this->hasMessagesFor($name));die();
        /*if ($this->hasMessagesFor($name)) {
            foreach ($this->getMessagesFor($name) as $message) {
                return $message;
            }
        }*/
    }
}