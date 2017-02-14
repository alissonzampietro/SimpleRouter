<?php
namespace Routers;

use File\Reader;

class Router extends Route
{
	
	private $classes;
	private $instance;
	private $namespace;
	
	// You need define default namespace for controller, when create the instance of Router
    public function __construct($namespace)
    {
    	$this->namespace = $namespace;
        self::setDataRequest();
        // atualizar o cache
        $reader = new Reader(__DIR__."/../app/Controller/");
        $this->classes = $reader->getFileClasses();
        
        $this->instance = $this->instance(self::$uriClass);
    }
    
    private function instance($route)
    {
    	if(in_array($route, $this->classes)) {
    		$controller = $this->namespace."\\".ucfirst($route);
    		return new $controller();
    	}else{
    		header("HTTP/1.0 404 Not Found");
    	}
    
    }

    public function get($route, $function)
    {
        $route = explode("/", $route);
        if($_SERVER['REQUEST_METHOD'] != "GET")
            return;
        if($route[1] != self::$uri[1])
            return false;
        $function($this->instance);
    }
}