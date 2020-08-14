<?php
	/**
	 * 
	 */
	use classes/Produto;
	use classes/Categoria;
	class ClassName 
	{
		private $categoria;
		private $produto;
		function __construct($categoria,$produto)
		{
			$this->categoria = $categoria;
			$this->produto = $produto;
		}
	}

?>