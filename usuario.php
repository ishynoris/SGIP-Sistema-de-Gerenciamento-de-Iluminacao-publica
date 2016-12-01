<?php 
	include 'header.php';
	include 'controller/NovoUsuarioController.class.php';
	
	$controller = new UsuarioController;
	$controller->activePost(array('edtSalvar'));
?>

<html>
	<head>
	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/chosen.min.css">
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/chosen.jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.mask.js"></script>
		<script type="text/javascript" src="js/script.novo.cadastro.js"></script>
		<script>
			$(document).ready(function(){
				var html = $("#novo-cadastro").load("novo-cadastro.php #form-novo-cadastro");
			});
		</script>
	<head>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 
?>
	<div class="col-sm-9" style="margin-top: 20px;">
		<form class="bk clear" style="padding: 30px " method="post">
	
			<div id="novo-cadastro"></div><br>
			
		</form><br/><br/><br/>
		<table class="bk" width="100%">
			<tr>
				<th class="col-sm-1">#</th>
				<th class="col-sm-4">Nome</th>
				<th class="col-sm-4">Login</th>
				<th class="col-sm-3">Tipo de usuário</th>
			</tr>

			<?php 
				$buscarUsuario = $dtibd->executarQuery("select","SELECT * FROM usuario");
				foreach ($buscarUsuario as $result) {
			?>
				<tr>
					<td class="tdPers"><?php echo $result['id'];?></td>
					<td class="tdPers"><?php echo $result['usuario'];?></td>
					<td class="tdPers"><?php echo $result['login'];?></td>
					<td class="tdPers"><?php echo Usuario::tipoUsuario($result['isAdmin']);?></td>
				</tr>
			<?php 
				}
			?>
		</table>
	</div>
</div>

<?php
	include 'footer.php';
?>