<?php
namespace Routers;

use File\Reader;

class Router extends Route
{
	
	private $controllersCached;

    public function __construct()
    {
        self::setDataRequest();
        // atualizar o cache
        $reader = new Reader();
        $this->controllersCached = $reader->getCachedControllers();
        
        $instance = $this->findRoute(self::$uriClass);
        if($instance == FALSE)
        	header("HTTP/1.0 404 Not Found");
        $reader->findRoute(self::$uriClass);
    }
    
    private function findRoute($route)
    {
    	if(in_array($route, $this->controllersCached)) {
    		$controller = ucfirst($route)."Controller";
    		return new $controller();
    	}else{
    		return false;
    	}
    
    }

    public function get($route, $function)
    {
        $route = explode("/", $route);
        if($_SERVER['REQUEST_METHOD'] != "GET")
            return;
        if($route[1] != self::$uri[1] || $route[2] != self::$uri[2])
            return;
        $array = array(self::$uriClass, self::$uriMethod);
    }
}