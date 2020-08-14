<?php

	define('INCLUDE_PATH','http://localhost/projeto_Estoque/');
	define('HOST','localhost');
	define('DBNAME', 'lojinha_mae');
	define('USER','root');
	define('PASSWORD','');
	define('UPLOADFILE',__DIR__.'/images/');

	$categoriaArray = array('1'=>'Perfumaria','2'=>'Maquiagem','3'=>'Corpo e Rosto','4'=>'Cuidados diários','5'=>'Vestuário');
	$autoload = function($class){
		if(file_exists('classes/'.$class.'.php')){
			include('classes/'.$class.'.php');
		}
	};
	include('classes/Upload.php');
	spl_autoload_register($autoload);
?>