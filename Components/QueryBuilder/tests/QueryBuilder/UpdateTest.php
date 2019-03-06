<?php
namespace CodeTests\QueryBuilder;

use Code\QueryBuilder\Update;
use PHPUnit\Framework\TestCase;


class UpdateTest extends TestCase
{
	private $update;

	protected function assertPreConditions() :void
	{
		$this->assertTrue(class_exists(Update::class));
	}

	protected function setUp(): void
	{
		$this->update = new Update('products', ['name', 'price'], ['id' => '1']);
	}

	public function testIfUpdateQueryHasGeneratedWithSuccess()
	{
		$sql = "UPDATE products SET name = :name, price = :price WHERE id = 1";

		$this->assertEquals($sql, $this->update->getSql());
	}
}