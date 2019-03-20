<?php
namespace Code\QueryBuilder\Query;


class Update implements QueryInterface
{
	private $sql;

	public function __construct(string $table, array $fields = array(), array $conditions = array(), $logicOperator = ' AND ')
	{
		$this->sql = 'UPDATE ' .  $table . ' SET ';

		$set = '';

		foreach($fields as $f) {
			$set .= $set ? ', ' . $f . ' = :' . $f
				         : $f . ' = :' . $f;
		}

		$where = '';

		foreach($conditions as $key => $c) {
			$where .= $where ? $logicOperator . $key . ' = ' . $c
				             : ' WHERE ' . $key . ' = ' . $c;
		}

		$this->sql .= $set . $where;
	}

	public function getSql()
	{
		return $this->sql;
	}
}