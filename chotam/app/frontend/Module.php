<?php
namespace Module\Frontend;

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
                'Module\Frontend\Controllers' => __DIR__ . '/controllers',
                'Module\Models' => __DIR__ . '/../models',
                'Chotam\Forms' => __DIR__ . '/../forms',
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
            $dispatcher->setDefaultNamespace('Module\Frontend\Controllers');
            return $dispatcher;
        });
        //Registering the view component
        if(($dependencyInjector->get('session')->get('language') == 'en'))
        {
            $dependencyInjector->set('view', function(){
                    $view = new View(); 
                    $view->setViewsDir(__DIR__ . '/views/singapore_desktop');
                    $view->registerEngines(array(
                        ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
                    ));
                    
                    $view->setLayoutsDir( '../../../layouts/singapore_desktop/' );
                    $view->setPartialsDir( '../../../layouts/singapore_desktop/' );
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
        else
        {
            if(checkDevice() == 0)
            {
                $dependencyInjector->set('view', function(){
                    $view = new View(); 
                    $view->setViewsDir(__DIR__ . '/views/default');
                    $view->registerEngines(array(
                        ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
                    ));
                    
                    $view->setLayoutsDir( '../../../layouts/frontend/' );
                    $view->setPartialsDir( '../../../layouts/frontend/' );
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
            else
            {
                $dependencyInjector->set('view', function(){
                    $view = new View(); 
                    $view->setViewsDir(__DIR__ . '/views/mobile');
                    $view->registerEngines(array(
                        ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
                    ));
                    
                    $view->setLayoutsDir( '../../../layouts/mobile/' );
                    $view->setPartialsDir( '../../../layouts/mobile/' );
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
     }
}