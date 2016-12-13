<?php
header("Access-Control-Allow-Origin: *");

if (isset($_FILES['file'])) {
	if (is_file($_FILES['file']['tmp_name'])) {
		$arquivo = $_FILES['file']['tmp_name'];
		$caminho = "data/";
		$caminho = $caminho.$_FILES['file']['name'];

		if (!(preg_match("/.php$/i", $_FILES['file']['name']))){
			move_uploaded_file($arquivo,$caminho);										
		}
	}							
} 

?>