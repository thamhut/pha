<?php
namespace Module\Admin;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\ModuleDefinitionInterface; 
use Phalcon\Mvc\View\Engine\Volt as VoltEngine; 
include __DIR__ .'/../../conf/function.php';

class Module implements  ModuleDefinitionInterface
{
     /**
     * Register a specific autoloader for the module
     */
     public function registerAutoloaders(\Phalcon\DiInterface $dependencyInjector = null)
     {
         $loader = new Loader();
         $loader->registerNamespaces(
            array(
                'Module\Admin\Controllers' => __DIR__ . '/controllers',
                'Module\Models' => __DIR__ . '/../models',
                'Module\Forms' => __DIR__ . '/../forms',
            )
         );
         $loader->register();
     }
     
     /**
     * Register specific services for the module
     */
     public function registerServices(\Phalcon\DiInterface $dependencyInjector)
     {
        //Registering a dispatcher
        $dependencyInjector->set('dispatcher', function(){
            $dispatcher = new Dispatcher();
            $dispatcher->setDefaultNamespace('Module\Admin\Controllers');
            return $dispatcher;
        });
        //Registering the view component
        
        $dependencyInjector->set('view', function(){
            $view = new View(); 
            $view->setViewsDir(__DIR__ . '/views/default');
            $view->registerEngines(array(
                ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
            ));
            
            $view->setLayoutsDir( '../../../layouts/admin/' );
            $view->setPartialsDir( '../../../layouts/admin/' );
            $view->setTemplateAfter('main');
            $view->registerEngines(array(
        		'.volt' => function($view, $dependencyInjector) {
        			$volt = new VoltEngine($view, $dependencyInjector);
        			$volt->setOptions(array(
        				'compiledPath' => __DIR__.'/../cache/volt',
        				'compiledSeparator' => '_',
        			));
        			return $volt;
        		},
        		'.phtml' => 'Phalcon\Mvc\View\Engine\Php' // Generate Template files uses PHP itself as the template engine
        	));
            return $view;
        });
        
     }
}