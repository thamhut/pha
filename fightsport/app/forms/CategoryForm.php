<?php
namespace Module\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use \Module\Models\Category;
use Phalcon\Validation\Validator\PresenceOf;

Class CategoryForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $name = new Text('name', array('placeholder' => 'Type a name'));
        $name->addValidators(array(
        new PresenceOf(array(
            'message' => 'Name not empty!',
        ))));
        $this->add($name);
        
        $category_data = Category::find(array('id = 0'));
        $category_data = $category_data->toArray();
        $lstCate = array();
        foreach($category_data as $item)
        {
            $lstCate[$item['id_level']] = $item['name'];
        }
        $id_category = new Select('id_category', $lstCate, 
            array('useEmpty' => true,
            'emptyText' => 'Please, choose one...',
            'emptyValue' => '0', 
            'value' => '0' ));
        
        $this->add($id_category);
    }
}