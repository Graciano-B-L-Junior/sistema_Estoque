<?php
	$sql = ConexaoBD::conexao();
	$sql = $sql->prepare("SELECT * FROM `produto`");
	$sql->execute();
	$info = $sql->fetchAll();
	if(isset($_GET['excluir'])){
		$id = $_GET['excluir'];
		$sql2 = ConexaoBD::conexao();
		$sql2 = $sql2->prepare("SELECT * FROM `produto` WHERE `id` = $id");
		$sql2->execute();
		$info2 = $sql2->fetch();
		Produto::deletarProduto($info2['id'],$info2['imagem']);
		header('Location: '.INCLUDE_PATH.'Estoquecompleto');
		die();
	}
?>
<div class="estoque-info">
	<div class="center">
	<h1>Seu Estoque completo</h1>
	</div>
	<?php foreach ($categoriaArray as $key => $value) { ?>
	<div class="categoria-info center">
		<div class="categoria-info-cabecalho">
			<div class="categoria-info-wrapper">
				<div class="categoria-info-nome">
					<h2><?php echo $value;?></h2>
				</div>
				<div class="categoria-info-dados">
					<ul>
						<li>Qtd</li>
						<li>R$(Custo)</li>
						<li>R$(Venda)</li>
					</ul>
			</div>
		</div>
		<?php 
			foreach ($info as $chave => $nome) {
				if($key !=$nome['categoria'])
					continue;
		?>
		<div class="categoria-info-produto">
			<div class="categoria-info-nome">
			<h4><?php echo $nome['nome'];?></h4>
			<?php if($nome['imagem'] !=null) { ?>
			<img src="images/<?php echo $nome['imagem']?>" style="width: 70px;height: 70px;">
			<?php }?>
			</div>
			<div class="categoria-info-dados">
			<ul>
				<li><?php echo $nome['quantidade']; ?></li>
				<li>R$<?php echo $nome['preco_custo']; ?></li>
				<li>R$<?php echo $nome['preco_venda']; ?></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>EditarProduto?id=<?php echo $nome['id'];?>">Editar</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>Estoquecompleto?excluir=<?php echo $nome['id']; ?>" style="font-weight: bolder">Excluir</a></li>
			</ul>
			</div>
		</div>
		<?php }?>
	</div><!--categoria-info-cabeçalho--->
	
</div>
<?php }?>
