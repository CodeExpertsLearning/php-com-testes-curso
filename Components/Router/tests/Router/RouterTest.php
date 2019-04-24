<?php
namespace CodeTest\Router;

use PHPUnit\Framework\TestCase;
use Code\Router\Router;

class RouterTest extends TestCase
{
	public function testRouterSetOfRoutes()
	{
		$_SERVER['REQUEST_URI'] = '/users';

		$router = new Router();

		$router->addRoute('/users', function() {
			return 'Primeira Rota!';
		});

		$result = $router->run();

		$this->assertEquals('Primeira Rota!', $result);
	}

	public function testValidateANoRouteFound()
	{
		$this->expectException('\Exception');
		$this->expectExceptionMessage('Route Not Found');

		$_SERVER['REQUEST_URI'] = '/products';

		$router = new Router();
		$router->run();
	}
}