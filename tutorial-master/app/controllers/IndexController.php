<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{

    protected function initialize()
    {
        //Prepend the application name to the title
        $this->tag->prependTitle('INVO | ');
        $this->tag->setTitle('Manage your product types');
    }


	public function indexAction()
	{
        $this->persistent->name = "Michael";  
	}
    
    public function notFoundAction()
    {
        echo "Welcome, ", $this->persistent->name;
    }

}
