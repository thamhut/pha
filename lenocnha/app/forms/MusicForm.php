<?php
namespace Chotam\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Module\Frontend\Controllers\ControllerBase;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\File;
use Phalcon\Forms\Element\Select;
use Phalcon\Validation\Validator\PresenceOf;
use \Module\Models\Category;

Class MusicForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
         $controller = new ControllerBase;
         $title = new Text('title', array('placeholder' => $controller->_getTranslation()->_('title')));
         $title->addValidators(array(
            new PresenceOf(array(
                'message' => $controller->_getTranslation()->_('not_empty'),
         ))));
         $this->add($title);
         $link = new Text('link', array('placeholder' => $controller->_getTranslation()->_('link')));
         $link->addValidators(array(
            new PresenceOf(array(
                'link' => $controller->_getTranslation()->_('not_empty'),
         ))));
         $this->add($link);
         $category_data = new Category;
         $category_data = $category_data->getAll();
         $data_cate = array();
         foreach($category_data as $item)
         {
             $data_cate[$item->id] = strtoupper($item->name);
         }
         $category = new Select('category', $data_cate);
         $category->addValidators(array(
            new PresenceOf(array(
                'category' => $controller->_getTranslation()->_('not_empty'),
         ))));
         $this->add($category);
         $content = new TextArea('content', array(
            'placeholder' => $controller->_getTranslation()->_('content_placeholder')
         ));
         $content->addValidators(array(
            new PresenceOf(array(
                'content' => $controller->_getTranslation()->_('not_empty'),
         ))));
         $this->add($content);
         $incode = new Text('incode');
         $incode->addValidators(array(
            new PresenceOf(array(
                'incode' => $controller->_getTranslation()->_('not_empty'),
         ))));
         $this->add($incode);
    }
}