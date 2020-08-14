<?php 
	if(isset($_POST['acao'])){
		if(move_uploaded_file($_FILES['arquivo']['tmp_name'], UPLOADFILE.$_FILES['arquivo']['name'])){
			echo 'enviado';
		}else{
			echo 'erro ao enviar';
		}
	}
?>

<form method="post" enctype="multipart/form-data">
	<input type="file" name="arquivo">
	<input type="submit" name="acao">
</form>