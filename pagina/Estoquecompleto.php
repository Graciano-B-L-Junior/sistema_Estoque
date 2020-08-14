<?php
	$sql = ConexaoBD::conexao();
	$sql = $sql->prepare("SELECT * FROM `produto`");
	$sql->execute();
	$info = $sql->fetchAll();
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
						<li>Editar</li>
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
			</div>
			<div class="categoria-info-dados">
			<ul>
				<li><?php echo $nome['quantidade']; ?></li>
				<li>R$<?php echo $nome['preco_custo']; ?></li>
				<li>R$<?php echo $nome['preco_venda']; ?></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>EditarProduto?id=<?php echo $nome['id'];?>">Editar</a></li>
			</ul>
			</div>
		</div>
		<?php }?>
	</div><!--categoria-info-cabeçalho--->
	
</div>
<?php }?>
