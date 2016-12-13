<?php 
	include ('classes/conecta_bancoAdmin.php');

	$id = $_GET['id'];
	$logradouro = urldecode($_GET['log']);

	$dtibd->executarQuery("delete","DELETE FROM caracteristicaspontoiluminacao WHERE idPontoIluminacao = $id");
	$dtibd->executarQuery("delete","DELETE FROM pontoiluminacao WHERE id = $id");
	$dtibd->executarQuery("delete","DELETE FROM pontosmapa WHERE address = '$logradouro'");

	header("location: parquedeiluminacao.php");
?>