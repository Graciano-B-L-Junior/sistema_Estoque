<?php

	/**
	 * 
	 */
	class Produto 
	{
		private $nome;
		private $quantidade;
		private $precoCusto;
		private $precoVenda;
		private $categoria;
		private $marca;
		function __construct($nome,$quantidade,$precoCusto,$precoVenda,$categoria,$marca)
		{
			$this->nome=$nome;
			$this->quantidade =$quantidade;
			$this->precoCusto =$precoCusto;
			$this->precoVenda =$precoVenda;
			$this->categoria =$categoria;
			$this->marca = $marca;
		}

		public function cadastrarProduto(){
			$sql = ConexaoBD::conexao();
			$sql = $sql->prepare("INSERT INTO `produto` VALUES (null,?,?,?,?,?,?)");
			$sql->execute(array($this->nome,$this->quantidade,$this->precoCusto,$this->precoVenda,$this->categoria,$this->marca));
			
		}
	}
?>