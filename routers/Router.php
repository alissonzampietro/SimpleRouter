<?php
namespace Routers;

use File\Reader;

class Router extends SettingRoute
{

    public function __construct()
    {
        (new Reader());
        self::setDataRequest();
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