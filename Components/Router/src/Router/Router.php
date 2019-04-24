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

		return $this->routeCollection[$this->uriServer]();
	}
}