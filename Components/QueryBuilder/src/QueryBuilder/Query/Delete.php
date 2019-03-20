<?php
namespace Code\QueryBuilder\Query;


class Delete implements QueryInterface
{
	private $sql;

	public function __construct($table, $conditions, $logicOperator = ' AND ')
	{
		$this->sql = 'DELETE FROM ' . $table;

		$where = '';

		foreach($conditions as $key => $c) {
			$where .= $where ? $logicOperator . $key . ' = ' . $c
				: ' WHERE ' . $key . ' = ' . $c;
		}

		$this->sql .= $where;
	}

	public function getSql()
	{
		return $this->sql;
	}
}