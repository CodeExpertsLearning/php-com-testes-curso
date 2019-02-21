<?php
namespace Code;


class Carrinho
{
	private $produtos = [];

	public function addProduto($produto, Log $log = null)
	{
		$this->produtos[] = $produto;

		if(!is_null($log))
			$log->log('Adicionando produto no carrinho');
	}

	public function getProdutos()
	{
		return $this->produtos;
	}

	public function getTotalProdutos()
	{
		return count($this->produtos);
	}

	public function getTotalCompra()
	{
		$totalCompra = 0;

		foreach ($this->produtos as $p) {
			$totalCompra += $p->getPrice();
		}

		return $totalCompra;
	}
}