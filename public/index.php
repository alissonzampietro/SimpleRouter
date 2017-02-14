<?php
require __DIR__."/../vendor/autoload.php";

use Routers\Router;
use App\Controller;

$router = new Router("App\\Controller");

$router->get("/menino", function ($alisson) {
    echo $alisson->mensagem("Maria");
});

$router->get("/hubira", function ($alisson) {
	echo $alisson->mensagem("Bernadeli");
});