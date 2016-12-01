<?php
    include 'function.php';
    include 'classes/conecta_bancoAdmin.php';
	$error = '';

    if(isset($_POST['enviar'])){
        
		$error = logarNoSistema($_POST['edtLogin'], $_POST['edtSenha']);
		if ($error == LOGIN_SENHA_VALIDO){
			header("Location: home.php");
			exit;
		}
			
    } else if(isset($_POST['cadastro'])){
		
		header("Location: novo-cadastro.php"); 
		
	} else if(isset($_POST['novaSenha'])){
		
		header("Location: recuperar-senha.php");
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
		<div class="wrapper" style="padding: 80px">
			<img src="demos/logo.png">
		</div>
		
		<article class="col-sm-12">
			<div class="col-sm-4 col-sm-offset-4 login">
						
				<form action="" method="post">
					
					<div class="input-group-lg">
                        <input type="text" name="edtLogin" class="form-control" placeholder="CPF" value="admin"/><br>
						<input type="password" name="edtSenha" class="form-control" placeholder="Senha" value="admin"/>
					</div><br>
				
					<input type="submit" class="btn btn-primary btn-lg btn-block btnLogin"  
									value="Entrar" name="enviar" style="margin-bottom: 20px;"/>
					<div class="btn-group btn-group-justified" role="group" aria-label="...">
						<div class="btn-group" role="group">
							<input type="submit" class="btn btn-info btn-lg" value="Novo cadastro" name="cadastro"/>
						</div>
						<div class="btn-group" role="group">
							<input type="submit" class="btn btn-default btn-lg" value="Esqueci a senha" name="novaSenha"/>
						</div>
					</div>
				</form>
			</div>
		</article>
	</section>
<?php 
	if ($error == LOGIN_SENHA_NULL || $error == LOGIN_SENHA_INVALIDO){ 
?>
		<div style="padding-top:50px;">
			<div class="wrapper alert alert-danger" role="alert"><?php echo $error;?></div>
		</div>
<?php
	}
?>
</body>

</html>