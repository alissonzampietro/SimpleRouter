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
        $this->router = new Router("App\\Controller", "/menino", "GET");
    }

    public function testSeCriaInstancia()
    {
        $this->router->get("/menino", function($instancia) {
            $this->assertInstanceOf('Menino', $instancia);
        });
    }
}