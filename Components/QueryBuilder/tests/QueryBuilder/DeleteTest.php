<?php
namespace CodeTests\QueryBuilder;

use Code\QueryBuilder\Delete;
use PHPUnit\Framework\TestCase;

class DeleteTest extends TestCase
{
	private $delete;

	protected function assertPreConditions() :void
	{
		$this->assertTrue(class_exists(Delete::class));
	}
	protected function setUp(): void
	{
		$this->delete = new Delete('products', ['id' => 10]);
	}

	public function testIfDeleteQueryHasGeneratedWithSuccess()
	{
		$sql = 'DELETE FROM products WHERE id = 10';

		$this->assertEquals($sql, $this->delete->getSql());
	}
}