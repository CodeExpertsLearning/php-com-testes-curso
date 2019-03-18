<?php
namespace Code\QueryBuilder\Query;


class Insert
{
	private $sql;

	public function __construct(string $table, array $fields = array())
	{
		$this->sql = 'INSERT INTO ' . $table;

		if(count($fields) > 0)
			$this->sql .= '(' . implode(', ', $fields) . ')';

		$this->sql .= ' VALUES(:' . implode(', :', $fields) . ')';
	}

	public function getSql()
	{
		return $this->sql;
	}
}