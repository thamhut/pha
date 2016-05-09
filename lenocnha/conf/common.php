<?php 

use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Flash\Direct as FlashDirect;
use Phalcon\Mvc\Dispatcher;


include('Utils.php');

//Specify routes for modules
$di->set('getCurrentPageURL', function () {

    $pageURL = 'http';
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
    $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
    $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
});

/**
 * Get real ip user
 */
$di->set('getRealIPAddress', function () {
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        //check ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        //to check ip is pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
});


/**
 * Database connection is created based in the parameters defined in the configuration file
 */
$di->set('db', function () {
    return new DbAdapter(array(
        "host" => 'localhost',
        "username" => 'root',
        "password" => '',
        "dbname" => 'nhacsan_db',
        "options" => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
        )
    ));
}); 



//Register the flash service with custom CSS classes
$di->set('flash', function(){
    $flash = new FlashDirect(array(
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ));
    return $flash;
});

// Register the dispatcher setting a Namespace for controllers
$di->set('dispatcher', function() {
    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace('Module\Frontend\Controllers');
    return $dispatcher;
}); 

/**
 * Load class Utils
 */
$di->set('utils', function () {
    return new Utils();
});