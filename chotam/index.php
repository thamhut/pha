<?php

error_reporting(E_ALL);

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\DI\FactoryDefault;
use Phalcon\Session\Adapter\Files as Session; 



$di = new FactoryDefault();

define('APP_PATH', realpath('') . '/');

//Specify routes for modules
$di->set('router', function () {

    $router = new Router();

    $router->setDefaultModule("frontend");
    $router->setDefaultNamespace('Module\Frontend\Controllers');
    
    $router->add(
        "/category/([0-9 a-z\-]+)\_i{id}",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "category",
            "id"    =>  1,
        )
    );
    $router->add(
        "/sitemap",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "sitemap",
        )
    );
    $router->add(
        "/detail/([0-9 a-z\-]+)\_i{id}\.html",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "detail",
            "id"    =>  1,
        )
    );
    $router->add(
        "/sg",
        array(
            "module"   =>  "frontend",
            "controller" => "index"
        )
    );
    $router->add(
        "/singapore/category/([0-9 a-z\-]+)\_i{id}",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "category",
            "id"    =>  1,
        )
    );
    $router->add(
        "/singapore/detail/([0-9 a-z\-]+)\_i{id}\.html",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "detail",
            "id"    =>  1,
        )
    );
    
    return $router;
});

/**
 * The URL component is used to generate all kind of urls in the application
 */
$di->set('url', function(){
    $url = new \Phalcon\Mvc\Url();
    $url->setBaseUri('/');
    return $url;
});

/**
 * Register session
 */

//Start the session the first time when some component request the session service
$di->set('session', function() {
    $session = new Session();
    $session->start();
    return $session;
});

if(!$di->get('session')->has('language'))
{
    $d = '<div id="box_upload"><div id = "load_user_action" style="margin-bottom:20px;">';
    $d .= '<select id="select_lang" style="border:1px solid #dddddd; padding:4px;"><option value = "vn">Viet Nam</option><option value="en" >Singapore</option></select>&nbsp;&nbsp;<button onclick="redirect();" class="b_upload">Go</button>';
    $d .= '</div></div>';
    $c = '<div id="background" style="background: none repeat scroll 0 0 #000;height: 100%;opacity: 0.4;position: absolute;z-index:9;top: 0;width: 100%;" id="Dmid" onclick="cDialogimg();"></div>';
    $c .= '<div id="Dtop" style="top:300px;position: absolute;width: 100%;z-index: 10;text-align:center;"><div class="dbody"><div class="dbox">'.$d.'<div style="clear:both;"></div></div></div></div>';
    echo $c;
}
	
 
if(strpos($_SERVER['REQUEST_URI'],'/singapore')!==false || strpos($_SERVER['REQUEST_URI'],'/sg')!==false)
{
    $di->get('session')->set('language','en');
}

/**
 * Include common file
 */
$fil = include 'conf/common.php';

try { 

	/**
	 * Read the configuration
	 */

	$application = new Application($di);
    $application->setDI($di);
    
    /**
     *  Register modules
     */
    $application->registerModules(
        array(
            'frontend' => array(
                'className' => 'Module\Frontend\Module',
                'path' => APP_PATH.'app/frontend/Module.php',
            ),
        )
    );
    
	echo $application->handle()->getContent();

} catch (Exception $e){
	echo $e->getMessage();
}

