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

    //$router->setDefaultModule("frontend");
    //$router->setDefaultNamespace('Module\Frontend\Controllers');
    $router->add('/', array(
        'module' => 'frontend',
    ));  
    $router->add('/admin/:controller/:action', array(
        'module' => 'admin',
        'controller' => 1,
        'action' => 2
    ));

     $router->add('/admin/:controller', array(
        'module' => 'admin',
        'controller' => 1,
        'action' => 'index'
    )); 
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
        "/category/([0-9 a-z\-]+)\_i{id}\.html",
        array(
            "module"   =>  "frontend",
            "controller" => "index",
            "action"     => "category",
            "id"    =>  1,
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
        "/tag/index/:params",
        array(
            "module"   =>  "frontend",
            "controller" => "tag",
            "action"     => "index",
            "params"    =>  1,
        )
    );  
    $router->add('/admin', array(
        'module' => 'admin',
        'controller' => 'index',
        'action' => 'index'
    ));  
    $router->add('/admin/:controller/:action', array(
        'module' => 'admin',
        'controller' => 1,
        'action' => 2
    ));
    $router->add('/admin/:controller/:action/:params', array(
        'module' => 'admin',
        'controller' => 1,
        'action' => 2,
        'params' => 3,
    ));

     $router->add('/admin/:controller', array(
        'module' => 'admin',
        'controller' => 1,
        'action' => 'index'
    )); 
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
            'admin' => array(
                'className' => 'Module\Admin\Module',
                'path' => APP_PATH.'app/admin/Module.php',
            ),
        )
    );
    
	echo $application->handle()->getContent();  

} catch (Exception $e){
	echo $e->getMessage();
}

