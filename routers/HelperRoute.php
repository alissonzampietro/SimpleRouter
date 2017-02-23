<?php
namespace Routers;

abstract class HelperRoute
{   
    protected static $uri;
    
    protected static $httpMethod;
    
    protected static $uriClass;
    
    protected static $params;
    

    public static function setDataRequest($uri, $httpMethod)
    {
        if($uri == NULL)
            $uri = $_SERVER['REQUEST_URI'];
        if($httpMethod == NULL)
            self::$httpMethod = $_SERVER['REQUEST_METHOD'];
        
        self::$uri = explode("/", $uri);
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
}