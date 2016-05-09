<?php
namespace Module\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Hidden;
use Phalcon\Forms\Element\TextArea;
use Phalcon\Forms\Element\Select;
use \Module\Models\Category;
use Phalcon\Validation\Validator\PresenceOf;

Class ArticleForm extends Form
{
    public function initialize($entity = null, $options = null)
    {
        $title = new Text('title', array('placeholder' => 'Type a title'));
        $title->addValidators(array(
        new PresenceOf(array(
            'message' => 'Title not empty!',
        ))));
        $this->add($title);
        
        $category_data = Category::find()->toArray(); 
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
        
        $content = new TextArea('content');
        $this->add($content);
        $tags = new Text('tags', array('placeholder' => 'Type a tags'));
        $this->add($tags);
    }
}