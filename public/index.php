<?php
require __DIR__."/../vendor/autoload.php";

use Routers\RouterCaller;
use FileManager\FileReader;
use App\Controller\MeninoController;

(new FileReader());
$router = new RouterCaller();

$router->get("/hubira/viado", function ($alisson) {
    var_dump($alisson);
});