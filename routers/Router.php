<?php
namespace Routers;

class Router extends SettingRoute
{

    public function __construct()
    {
        self::$uri = explode("/", $_SERVER['REQUEST_URI']);
        self::setUriClass();
        self::setUriMethod();
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