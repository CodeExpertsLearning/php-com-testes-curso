<?php
namespace Code\Router;

class Router
{
	private $uriServer;

	private $routeCollection = [];

	public function __construct()
	{
		$this->uriServer = $_SERVER['REQUEST_URI'];
	}

	public function addRoute($uri, $callable)
	{
		$this->routeCollection[$uri] = $callable;
	}

	public function run()
	{
		//users/{id} <- funcao anonima
		(new Wildcard())->resolveRoute($this->uriServer, $this->routeCollection);

		if(!isset($this->routeCollection[$this->uriServer])) {
			throw new \Exception('Route Not Found');
		}

		$route = $this->routeCollection[$this->uriServer];

		if(is_callable($route)) {
			return $route();
		}

		if(is_string($route)) {
			return $this->controllerResolver($route);
		}
	}

	private function controllerResolver($route)
	{
		if(!strpos($route, '@')) {
			throw new \InvalidArgumentException('Wrong format to call a controller!');
		}

		list($controller, $method) = explode('@', $route);

		if(!method_exists(new $controller, $method)) {
			throw new \Exception('Method does not exists!');
		}

		return call_user_func_array([new $controller, $method], []);
	}
}