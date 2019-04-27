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
			throw new \InvalidArgumentException('Formato de Chamada para Controller Errada');
		}

		list($controller, $method) = explode('@', $route);

		$controller = '\\CodeTest\\Controller\\' . $controller;

		return call_user_func_array([new $controller, $method], []);
	}
}