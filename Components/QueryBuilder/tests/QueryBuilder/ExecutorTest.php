<?php
namespace CodeTests\QueryBuilder;

use Code\QueryBuilder\Query\Delete;
use Code\QueryBuilder\Query\Insert;
use Code\QueryBuilder\Query\Select;
use Code\QueryBuilder\Query\Update;
use PHPUnit\Framework\TestCase;
use Code\QueryBuilder\Executor;

class ExecutorTest extends TestCase
{
	private static $conn;

	public static function setUpBeforeClass(): void
	{
		self::$conn = new \PDO('sqlite::memory:');
		self::$conn->exec("
			CREATE TABLE IF NOT EXISTS 'products' (
			   'id' INTERGER PRIMARY KEY,
			   'name' TEXT,
			   'price' FLOAT,
			   'created_at' TIMESTAMP,
			   'updated_at' TIMESTAMP 
			);
		");
	}

	public static function tearDownAfterClass(): void
	{
		self::$conn->exec('DROP TABLE products');
	}

	public function testIfQueryObjectAreReturnedWhenUseTheStaticMethodMagic()
	{
		$selectQueryObject = Executor::select('products');
		$this->assertInstanceOf(Select::class, $selectQueryObject);

		$selectQueryObject = Executor::insert('products', []);
		$this->assertInstanceOf(Insert::class, $selectQueryObject);

		$selectQueryObject = Executor::update('products', [], []);
		$this->assertInstanceOf(Update::class, $selectQueryObject);

		$selectQueryObject = Executor::delete('products', []);
		$this->assertInstanceOf(Delete::class, $selectQueryObject);
	}

}