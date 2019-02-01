<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class ProdutoTest extends TestCase
{
	public function testSeONomeDoProdutoESetadoCorretamente()
	{
		$produto = new Produto();
		$produto->setName('Produto 1');

		$this->assertEquals('Produto 1', $produto->getName(), 'Valores não são iguais!');
	}

	public function testSeOPrecoDoProdutoESetadoCorretamente()
	{
		$produto = new Produto();
		$produto->setPrice('19.9w9');

		$this->assertEquals('19.99', $produto->getPrice(), 'Valores não são iguais!');
	}

	public function testSeOSlugDoProdutoESetadoCorretamente()
	{
		$produto = new Produto();
		$produto->setSlug('produto-1');

		$this->assertEquals('produto-1', $produto->getSlug(), 'Valores não são iguais!');
	}
}