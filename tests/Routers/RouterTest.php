<?php
namespace Test\Routers;

use Routers\Router;
use PHPUnit\Framework\TestCase;
use App\Controller\Menino;

class RouterTest extends TestCase
{
    
    private $router;
    
    public function __construct()
    {
        $this->router = new Router("App\\Controller");
        $_SERVER['REQUEST_METHOD'] = '/menino';
    }

    public function testSeCriaInstância()
    {
        $this->router->get("/menino", function($instancia) {
            $this->assertInstanceOf('Menino', $instancia);
        });
    }
}