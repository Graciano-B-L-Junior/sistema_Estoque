<?php

	/**
	 * 
	 */
	class UploadImages
	{
		public static function uploadFile($file){
			move_uploaded_file($file['tmp_name'],UPLOADFILE.$file['name']);
		}
	}
?>