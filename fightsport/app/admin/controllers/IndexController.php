<?php
namespace Module\Admin\Controllers; 

use \Module\Forms\CategoryForm;
use \Module\Models\Category;

class IndexController extends ControllerBase
{
    public function indexAction()
    {
        
    }
    
    public function robotAction()
    {
        $result = Category::find()->toArray();
        $data = array();
        foreach($result as $k=>$item)
        {
            if($item['id'] == 0)
            {
                $data[] = $item;
                $name = $item['name'];
                foreach($result as $item2)
                {
                    if($item2['id'] == $item['id_level'])
                    {
                        $arr = $item2;
                        $arr['name'] = $name.'-'.$item2['name'];
                        $data[] = $arr;
                    }
                }
            }
        }
        $data = $result;
        $xmldoc = new \DOMDocument('1.0','');
        $xmldoc->formatOutput = true;
        
        // create root nodes
        $root = $xmldoc->createElement("urlset");
        $root->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');
        $root->setAttribute('xmlns:xsi','http://www.w3.org/2001/XMLSchema-instance');
        $root->setAttribute('xsi:schemaLocation','http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        
        $xmldoc->appendChild($root);
        $elem = $xmldoc->createElement("url");
        
        //
        $loc = 'http://fightsportgroup.com/';
        $fname = $xmldoc->createElement("loc");
        $fname->appendChild($xmldoc->createTextNode($loc));
        $elem->appendChild( $fname );
        //
        $lastmod = date('Y-m-d').'T00:00:00+07:00';
        $lname = $xmldoc->createElement("lastmod");
        $lname->appendChild($xmldoc->createTextNode($lastmod));
        $elem->appendChild($lname);
        //
        //
        $priority = '1';
        $_4priority = $xmldoc->createElement("priority");
        $_4priority->appendChild($xmldoc->createTextNode($priority));
        $elem->appendChild($_4priority);
        
        //create end root nodes
        $root->appendChild($elem);
        foreach($data as $item)
        {
            $title_convert = $this->utils->converToUrl($item['name']);
            $elem = $xmldoc->createElement("url");
            
            //
            $loc = 'http://fightsportgroup.com/category/'.$title_convert.'_i'.$item['id_level'];
            $fname = $xmldoc->createElement("loc");
            $fname->appendChild($xmldoc->createTextNode($loc));
            $elem->appendChild( $fname );
            //
            $lastmod = date('Y-m-d').'T00:00:00+07:00';
            $lname = $xmldoc->createElement("lastmod");
            $lname->appendChild($xmldoc->createTextNode($lastmod));
            $elem->appendChild($lname);
            //
            //
            $priority = '0.5';
            $_4priority = $xmldoc->createElement("priority");
            $_4priority->appendChild($xmldoc->createTextNode($priority));
            $elem->appendChild($_4priority);
            
            //create end root nodes
            $root->appendChild($elem);
            // create element nodes
        }
    
        //save file
        $xmldoc->save($_SERVER['DOCUMENT_ROOT']."/sitemap.xml") ;
    
    }
}