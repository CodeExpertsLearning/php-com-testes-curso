<?php
namespace Code\QueryBuilder;

use Code\QueryBuilder\Query\Delete;
use Code\QueryBuilder\Query\Insert;
use Code\QueryBuilder\Query\Select;
use Code\QueryBuilder\Query\Update;

class Executor
{
	public static function __callStatic($name, $args)
	{
		switch ($name) {
			case 'select':
				return new Select($args[0]);
			break;

			case 'insert':
				return new Insert($args[0], $args[1]);
			break;

			case 'update':
				return new Update($args[0], $args[1], $args[2]);
			break;

			case 'delete':
				return new Delete($args[0], $args[1]);
			break;

			default:
				return null;
		}
	}
}