<?php
	include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>GBS Estoque</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<div class="center">
		<h4>GB Sistemas</h4>
		<h2>BEM-VINDA GLAEDA!</h2>
		<ul>
			<li><a href="<?php echo INCLUDE_PATH?>Home">Inicio</a></li>
			<li><a href="<?php echo INCLUDE_PATH?>Estoquecompleto">Estoque</a></li>
			<li><a href="<?php echo INCLUDE_PATH?>Cadastrarproduto">Adicionar/Retirar Produtos</a></li>
		</ul>
	</div>
	</header>
		<?php
			if(!isset($_GET['url'])){
				include('pagina/Home.php');
			}else{
				$var =  $_GET['url'];
				$var = ucfirst($var);
				if(file_exists('pagina/'.$var.'.php')){
					include('pagina/'.$var.'.php');
				}else{
					include('pagina/Erro.php');
				}
			}
		?>
	<footer>
		<p>Feito com <span class="love"><3</span> por GB Sistemas</p>
	</footer>
</body>
</html>