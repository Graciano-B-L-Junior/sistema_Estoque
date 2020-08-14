<?php

	/**
	 * 
	 */
	class ConexaoBD 
	{
		private static $con;
		public static function conexao(){
			if(self::$con==null){
				try{
					self::$con = new PDO('mysql:host='.HOST.';dbname='.DBNAME,USER,PASSWORD);
				}catch(Exception $e){
					echo '<h2> Erro ao conectar</h2>';
				}
			}
			return self::$con;
		}
	}
?>