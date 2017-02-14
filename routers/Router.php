<?php
namespace Routers;

class Router extends Route
{
	private $instance;
	
	private $namespace;
	
	// You need define default namespace for controller, when create the instance of Router
    public function __construct($namespace)
    {
    	$this->namespace = $namespace;
        self::setDataRequest();
        // atualizar o cache
    }
    
    private function createInstance($route)
    {
    	$controller = $this->namespace."\\".ucfirst($route);
    	if(!class_exists($controller))
    		header("HTTP/1.0 404 Not Found");
    	return new $controller();
    }

    public function get($route, $function, $namespaceNeeded = NULL)
    {
    	if($namespaceNeeded != NULL)
    		$this->namespace = $namespaceNeeded;
    	
        $route = explode("/", $route);
        if($_SERVER['REQUEST_METHOD'] != "GET")
            return;
        if($route[1] != self::$uri[1])
            return false;
        $this->instance = $this->createInstance(self::$uriClass);
        $function($this->instance);
    }
}