<?php
require __DIR__."/../vendor/autoload.php";

use Routers\Router;
use App\Controller;

$router = new Router("App\\Controller");

$router->get("/menino", function ($classMessage) {
    echo $classMessage->mensagem("Maria");
});

$router->get("/hubira", function ($classMessage) {
	echo $classMessage->mensagem("Bernadeli");
});

$router->get("/invasao", function ($classMessage) {
	echo $classMessage->mensagem("Tiranossauro");
}, "Routers\\");