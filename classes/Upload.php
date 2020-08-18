<?php

	/**
	 * 
	 */
	class UploadImages
	{
		public static function uploadFile($file){
			if($file['size'] > '4194304‬'){
				echo 'Tamanho maior que 4 megabytes, selecione uma imagem menor';
			}else if($file['type'] == 'image/jpeg' || $file['type'] == 'image/jpg'
					|| $file['type'] == 'image/png'){
				if(move_uploaded_file($file['tmp_name'],UPLOADFILE.$file['name'])){
					//echo "Informações atualizadas com sucesso!";
				}else{
					//echo "ocorreu um erro ao enviar as imagens";
				}

			}else{
				//echo "Arquivo invalido";
			}
			
		}

		public static function deleteFile($filename){
			if(file_exists(UPLOADFILE.$filename)){
				unlink(UPLOADFILE.$filename);
				//echo "arquivo deletado";
			}else{
				//echo "arquivo não existe";
			}
			
		}
	}
?>