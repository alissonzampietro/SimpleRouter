<?php
namespace Routers;

class SettingRoute
{   
    protected static $uri;
    
    protected static $uriClass;
    
    protected static $lengthParams;
    
    protected static $uriMethod;
    
    protected static $params;
    
    public static function setDataRequest()
    {
        self::$uri = explode("/", $_SERVER['REQUEST_URI']);
        self::setUriClass();
        self::setUriMethod();
    }
    
    /**
     * Method to return the class of the URI
     * @return string
     */
    private static function setUriClass()
    {
        self::$uriClass = ucfirst(self::$uri[1])."Controller";
    }
    
    /**
     * Method to return the method of the URI
     * @return string
     */
    private static function setUriMethod()
    {
        $method = explode("_", self::$uri[2]);
        $finalMethod = "";
        $count = 0;
        foreach ($method as $item) {
            if($count >= 1) {
                $item = ucfirst($item);
            }
            $finalMethod .= $item;
            $count++;
        }
        
        self::$uriMethod = $finalMethod;
    }
    
    private static function setAttrs($route)
    {
        for($i = 0; $i < 3; $i++) {
            unset(self::$uri[$i]);
        }
        
        $routeExploded = explode("{", $route);
        if(count($routeExploded) > 1)
        {
        
        }
    
    }
    
    private static function setLengthParams($route)
    {
        $routeExploded = explode("{", $route);
        self::$lengthParams = count($routeExploded) - 1;
                
    }
}