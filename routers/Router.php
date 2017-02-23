<?php
namespace Routers;

class Router extends HelperRoute
{
	private $instance;
	
	private $namespace;
	
	// You need define default namespace for controller, when create the instance of Router
    public function __construct($namespace, $uri = NULL, $httpMethod = NULL)
    {
    	$this->namespace = $namespace;
        self::setDataRequest($uri, $httpMethod);
        // atualizar o cache
    }
    
    private function createInstance($route)
    {
    	$controller = $this->namespace."\\".ucfirst($route);
    	if(!class_exists($controller))
    		header("HTTP/1.0 404 Not Found");
    	return new $controller();
    }

    private function getValidParams($params)
    {
        $length = count($params) - 2;
        $uri = explode("/", self::$uri);
        return false;
    }

    public function get($route, $function, $namespaceNeeded = NULL)
    {
    	if($namespaceNeeded != NULL)
    		$this->namespace = $namespaceNeeded;
    	
        $route = explode("/", $route);
        if(self::$httpMethod != "GET")
            return;
        if($route[1] != self::$uri[1])
            return false;
        $validParams = $this->getValidParams($route);
        $this->instance = $this->createInstance(self::$uriClass);
        $function($this->instance);
    }
}