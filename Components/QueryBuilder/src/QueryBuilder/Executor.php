<?php
namespace Code\QueryBuilder;


use Code\QueryBuilder\Query\QueryInterface;

class Executor
{
	/**
	 * @var \PDO
	 */
	private $connection;

	/**
	 * @var QueryInterface
	 */
	private $query;

	/**
	 * @var array
	 */
	private $params = [];

	private $result;

	public function __construct(\PDO $connection, QueryInterface $query = null)
	{
		$this->connection = $connection;
		$this->query = $query;
	}

	public function setQuery(QueryInterface $query)
	{
		$this->query = $query;
	}

	public function setParam($bind, $value)
	{
		$this->params[] = ['bind' => $bind, 'value' => $value];
		return $this;
	}

	public function execute()
	{
		$proccess = $this->connection->prepare($this->query->getSql());

		if(count($this->params) > 0) {
			foreach($this->params as $param) {

				$type = gettype($param['value']) == 'integer' ? \PDO::PARAM_INT : \PDO::PARAM_STR;

				$proccess->bindValue($param['bind'], $param['value'], $type);
			}
		}

        $returnProccess = $proccess->execute();

		$this->result   = $proccess;

		return $returnProccess;
	}

	public function getResult()
	{
		if(!$this->result) return null;

		return $this->result->fetchAll(\PDO::FETCH_ASSOC);
	}

}