<?php
namespace Code\Router;

class Wildcard
{
	public function resolveRoute($route, &$routeCollection)
	{
		if($route == '/users/10') {
			$routeCollection[$route] = function() {
				return 'Rota com parâmetro!';
			};
		}
	}
}