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
        "/user/([0-9 a-z\-]+)\_i{id}",
        array(
            "module"   =>  "frontend",
            "controller" => "user",
            "action"     => "index",
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

