<?php
namespace Module\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use \Module\Models\Hot;
use Phalcon\Validation\Validator\PresenceOf;

Class HotForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $name = new Text('name', array('placeholder' => 'Type a name'));
        $name->addValidators(array(
        new PresenceOf(array(
            'message' => 'Name not empty!',
        ))));
        $this->add($name);
        
    }
}