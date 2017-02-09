<?php
require __DIR__."/../vendor/autoload.php";

//cache in days
$GLOBALS["CACHE_TIME"] = 5;

use Routers\Router;
use App\Controller\MeninoController;
$router = new Router();

$router->get("/hubira/viado", function ($alisson) {
    var_dump($alisson);
});