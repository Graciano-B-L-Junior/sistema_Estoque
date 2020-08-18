

<?php $verifica = false; 
	if(isset($_POST['acao'])){
		$nome = $_POST['nome'];
		$quantidade = $_POST['quantidade'];
		$precoCusto = $_POST['preco_custo'];
		$precoVenda = $_POST['preco_venda'];
		$categoria =$_POST['categoria'];
		$imagem = $_FILES['arquivo']['name'];
		if(isset($_FILES['arquivo'])){
			$produto = new Produto($nome,$quantidade,$precoCusto,$precoVenda,$categoria,0);
			UploadImages::uploadFile($_FILES['arquivo']);
			$produto->cadastrarProdutoComImagem($imagem);
			$verifica =true;
		}else{
			$produto = new Produto($nome,$quantidade,$precoCusto,$precoVenda,$categoria,0);
			$produto->cadastrarProduto();
			$verifica =true;
		}

		
	}

?>
<div class="form-update">
	<div class="box-form">
		<h2><?php if($verifica ==true){echo "Produto cadastrado :)";}else{ echo "Cadastrar Produto";} ?> </h2>
		<form method="post" enctype="multipart/form-data">
		<label>Nome do produto</label>
		<input type="text" name="nome" placeholder="nome do produto" >
		<label>Quantidade do produto</label>
		<input type="text" name="quantidade" placeholder="quantidade">
		<label>Preço de custo do produto</label>
		<input type="text" name="preco_custo" placeholder="preco de custo" >
		<label>Preço de venda do produto</label>
		<input type="text" name="preco_venda" placeholder="preco de venda" >
		<label>Selecione uma imagem</label>
		<input type="file" name="arquivo">
		<label>Selecione a categoria do produto</label>
		<select name="categoria">
			<?php
				foreach ($categoriaArray as $key => $value) {
			?>
			<option value="<?php echo $key;?>"><?php echo $value; ?></option>
		<?php }?>
		</select>
		<input type="submit" name="acao" value="Cadastrar">
	</form>
	</div>
</div>