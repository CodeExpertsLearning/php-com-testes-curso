<?php
namespace CodeTests\QueryBuilder\Query;

use PHPUnit\Framework\TestCase;
use Code\QueryBuilder\Query\Insert;

class InsertTest extends TestCase
{
	private $insert;

	protected function assertPreConditions() :void
	{
		$this->assertTrue(class_exists(Insert::class));
	}
	protected function setUp(): void
	{
		$this->insert = new Insert('products', ['name', 'price']);
	}

	public function testIfInsertionQueryHasGeneratedWithSuccess()
	{
		$sql = "INSERT INTO products(name, price) VALUES(:name, :price)";

		$this->assertEquals($sql, $this->insert->getSql());
	}
}