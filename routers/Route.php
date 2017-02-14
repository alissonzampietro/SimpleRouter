<?php
namespace Routers;

abstract class Route
{   
    protected static $uri;
    
    protected static $uriClass;
    
    protected static $params;
    

    public static function setDataRequest()
    {
        self::$uri = explode("/", $_SERVER['REQUEST_URI']);
        self::setUriClass();
    }
    
    /**
     * Method to return the class of the URI
     * @return string
     */
    private static function setUriClass()
    {
        self::$uriClass = ucfirst(self::$uri[1]);
    }
    
    private static function setLengthParams($route)
    {
        $routeExploded = explode("{", $route);
        self::$lengthParams = count($routeExploded) - 1;
                
    }
}