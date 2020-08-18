<?php 
	if(isset($_POST['acao'])){
		UploadImages::uploadFile($_FILES['arquivo']);
		UploadImages::deleteFile('sonic.jpg');
	}

?>

<form method="post" enctype="multipart/form-data">
	<input type="file" name="arquivo">
	<input type="submit" name="acao">
</form>