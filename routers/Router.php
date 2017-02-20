<?php
namespace Routers;

class Router extends HelperRoute
{
	private $instance;
	
	private $namespace;
	
	// You need define default namespace for controller, when create the instance of Router
    public function __construct($namespace)
    {
        if (preg_match('/\.(?:png|jpg|jpeg|gif)$/', $_SERVER["REQUEST_URI"])) {
            echo "oi";
            exit;
        } else {
            include __DIR__ . '/index.php';
        }

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

    private function getValidParams($params)
    {
        $length = count($params) - 2;
        $uri = explode("/", $_SERVER['REQUEST_URI']);
        return false;
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
        $validParams = $this->getValidParams($route);
        $this->instance = $this->createInstance(self::$uriClass);
        $function($this->instance);
    }
}