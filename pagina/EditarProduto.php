<?php
	$id = $_GET['id'];
	$verifica = false;

	$sql = ConexaoBD::conexao();
	$sql = $sql->prepare("SELECT * FROM `produto` WHERE id = $id");
	$sql->execute();
	$info = $sql->fetch();
	if(isset($_POST['acao'])){

		$nome = $_POST['nome'];
		$quantidade = $_POST['quantidade'];
		$precoCusto = $_POST['preco_custo'];
		$preco_venda = $_POST['preco_venda'];
		$categoria =$_POST['categoria'];
		if($_FILES['arquivo']['name']==""){
			$imagem = $info['imagem'];
		}else{
			UploadImages::deleteFile($info['imagem']);
			$imagem = $_FILES['arquivo']['name'];
		}
		
		$sql = ConexaoBD::conexao();
		$sql = $sql->prepare("UPDATE `produto` SET `nome`= ?,`quantidade`= ?,`preco_custo`= ?,`preco_venda`= ?,`categoria`= ?, `imagem` = ? WHERE `id` = $id");
		UploadImages::uploadFile($_FILES['arquivo']);
		$sql->execute(array($nome,$quantidade,$precoCusto,$preco_venda,$categoria,$imagem));

		
		$sql = ConexaoBD::conexao();
		$sql = $sql->prepare("SELECT * FROM `produto` WHERE id = $id");
		$sql->execute();
		$info = $sql->fetch();
		$verifica = true;
	}

?>
<div class="form-update">
	<div class="box-form">
		<h2><?php if($verifica ==true){echo "Produto Atualizado";}else{ echo "Atualizar Produto!";} ?> </h2>
		<form method="post" enctype="multipart/form-data">
		<label>Nome do produto</label>
		<input type="text" name="nome" placeholder="nome do produto" value="<?php echo $info['nome']; ?>">
		<label>Quantidade do produto</label>
		<input type="text" name="quantidade" placeholder="quantidade" value="<?php echo $info['quantidade']; ?>">
		<label>Preço de custo do produto</label>
		<input type="text" name="preco_custo" placeholder="preco de custo" value="<?php echo $info['preco_custo']; ?>">
		<label>Preço de venda do produto</label>
		<input type="text" name="preco_venda" placeholder="preco_venda" value="<?php echo $info['preco_venda']; ?>">
		<label>Selecione uma imagem</label>
		<input type="file" name="arquivo">
		<label>Selecione a categoria do produto</label>
		<select name="categoria">
			<?php
				foreach ($categoriaArray as $key => $value) {
			?>
			<option value="<?php echo $key;?>" <?php if($key==$info['categoria']){echo 'selected';}?>><?php echo $value; ?></option>
		<?php }?>
		</select>
		<input type="submit" name="acao" value="Atualizar">
	</form>
	</div>
</div>