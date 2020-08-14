<?php

	/**
	 * 
	 */
	use classes/Produto;
	namespace classes;
	class Categoria
	{
		private $nome;
		private $quantidade;

		function __construct($quantidade)
		{
			$this->nome=array('1'=>'Perfumaria','2'=>'Maquiagem','3'=>'Corpo e Rosto','4'=>'Cuidados diários','5'=>'Vestuário');
			$this->quantidade=$quantidade;
		}
		public function updateCategoria($id,$quantidade){
			$id = $this->nome[$id];
			$aux = ConexaoBD::conexao();
			$aux = $aux->prepare("SELECT `quantidade` FROM categoria WHERE `nome` = `$id`");
			$aux->execute();
			$aux = $aux->fetch();
			$quantidade+=$aux['quantidade'];
			$sql = ConexaoBD::conexao();
			$sql = $sql->prepare("UPDATE `categoria` SET quantidade=`$quantidade` WHERE nome = `$id`");
		}
	}
?>