<?php
namespace Code;

use PHPUnit\Framework\TestCase;

class CarrinhoTest extends TestCase
{
	private $carrinho;
	private $produto;

	public function setUp(): void
	{
		$this->carrinho = new Carrinho();
		$this->produto = new Produto();
	}

	public function tearDown(): void
	{
		unset($this->carrinho);
		unset($this->produto);
	}

//	public function testSeClasseCarrinhoExiste()
//	{
//		$classe = class_exists('\\Code\\Carrinho');
//
//		$this->assertTrue($classe);
//	}

	protected function assertPreConditions(): void
	{
		$classe = class_exists('\\Code\\Carrinho');

		$this->assertTrue($classe);
	}

	protected function assertPostConditions(): void
	{
		//Executada sempre depois do teste e o método tearDown...
	}

	public function testAdicaoDeProdutosNoCarrinho()
	{
		$produto = $this->produto;
		$produto->setName('Produto 1');
		$produto->setPrice(19.99);
		$produto->setSlug('produto-1');

		$produto2 = $this->produto;
		$produto2->setName('Produto 2');
		$produto2->setPrice(19.99);
		$produto2->setSlug('produto-2');

		$carrinho = $this->carrinho;
		$carrinho->addProduto($produto);
		$carrinho->addProduto($produto2);

		$this->assertIsArray($carrinho->getProdutos());
		$this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[0]);
		$this->assertInstanceOf('\\Code\\Produto', $carrinho->getProdutos()[1]);
	}

	public function testSeValoresDeProdutosNoCarrinhoEstaoCorretosConformePassado()
	{
		$produto = $this->produto;
		$produto->setName('Produto 1');
		$produto->setPrice(19.99);
		$produto->setSlug('produto-1');

		$carrinho = $this->carrinho;
		$carrinho->addProduto($produto);

		$this->assertEquals('Produto 1', $carrinho->getProdutos()[0]->getName());
		$this->assertEquals(19.99, $carrinho->getProdutos()[0]->getPrice());
		$this->assertEquals('produto-1', $carrinho->getProdutos()[0]->getSlug());
	}

	public function testSeTotalDeProdutosEValorDaCompraEstaoCorretos()
	{
		$produto = $this->produto;
		$produto->setName('Produto 1');
		$produto->setPrice(19.99);
		$produto->setSlug('produto-1');

		$produto2 = $this->produto;
		$produto2->setName('Produto 2');
		$produto2->setPrice(19.99);
		$produto2->setSlug('produto-2');

		$carrinho = $this->carrinho;
		$carrinho->addProduto($produto);
		$carrinho->addProduto($produto2);

		$this->assertEquals(2, $carrinho->getTotalProdutos());
		$this->assertEquals(39.98, $carrinho->getTotalCompra());
	}

	public function testIncompleto()
	{
		$this->assertTrue(true);
		$this->markTestIncomplete('Teste não está completo!');
	}

	/**
	 * @requires PHP == 5.3
	 */
	public function testSeFeatureEspecificaParaVersao53PHPTrabalhaDeFormaEsperada()
	{
//		if(PHP_VERSION != 5.3) {
//			$this->markTestSkipped('Este teste só roda para versão abaixo do PHP 7');
//		}

		$this->assertTrue(true);
	}
}