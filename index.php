<?php
    include 'function.php';
    include 'classes/conecta_bancoAdmin.php';

    if(isset($_POST['enviar'])){
        
		logarNoSistema($_POST['edtLogin'], $_POST['edtSenha']);
		
    } else if(isset($_POST['cadastro'])){
		
		header("Location: novoCadastro.php"); 
		
	} else if(isset($_POST['novaSenha'])){
		
		echo "Esquci minha senha";
	}
?>
<!DOCTYPE HTML>

<html lang="pt-br">
<head>
 	<meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/adminLogin.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
 	<link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css">
 	<script type="text/javascript" src="js/bootstrap.js"></script>
 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
 	<script type="text/javascript" src="js/npm.js"></script>
 	<title>Area Administrativa</title>
</head>

<body>
	<section class="container">
		<article class="col-sm-12">
			<div class="col-sm-6 col-sm-offset-3 login">
			<div class="topoLogin">Login</div>
			<div class="">                    
				<form action="" method="post"> 
					<input type="text" name="edtLogin" class="form-control loginUser login-field" placeholder="Usuario"><br>
					<input type="password" name="edtSenha" class="form-control loginPass login-field" placeholder="Senha"><br>
					
					<input type="submit" class="btn btn-danger btn-lg btn-block btnLogin"  value="Entrar" name="enviar" style="margin-bottom: 20px;"/>
					<input type="submit" class="btn btn-success btn-lg btn-block btnCadastro"  value="Novo cadastro" name="cadastro" style="margin-bottom: 20px;"/>
					<input type="submit" class="btn btn-info btn-lg btn-block btnNovaSenha"  value="Esqui minha senha" name="novaSenha"/>
				</form>
			</div>
			</div>            
		</article>
	</section>
</body>

</html>