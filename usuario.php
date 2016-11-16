<?php 
	include 'header.php';

	if(isset($_POST['edtSalvar'])){
		$usuario = new usuario;
		$usuario->Usuario = $_POST['edtUsuario'];
		$usuario->Login = $_POST['edtLogin'];
		$usuario->Pass = md5($_POST['edtPass']);
		$usuario->Admin = $_POST['edtAdmin'];
		
		$usuario->cadastrarUsuario();
	}
?>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 
?>
	<div class="col-sm-10" style="margin-right: 0;margin-top: 20px">
		<form action="" class="bk clear"  style="padding: 20px " method="POST" enctype="multipart/form-data">
			<fieldset>
				<div class="col-sm-12" style="margin: 0 auto">
					<legend>Cadastro de Usuarios</legend>
					<div class="col-sm-12">
						<label>Usuario</label><input type="text" name="edtUsuario" class="form-control "/><br>	
					</div>

					<div class="col-sm-12">
						<label>Login</label><input type="text" name="edtLogin" class="form-control "/><br>	
					</div>

					<div class="col-sm-12">
						<label>Senha</label><input type="password" name="edtPass" class="form-control "/><br>	
					</div>

					<div class="col-sm-12">
						<label>Grupo do Usuario</label><br>
						<input type="radio" name="edtAdmin" value="0"/>Administrador &nbsp; &nbsp;
						<input type="radio" name="edtAdmin" value="1"/>Equipe Tecnica &nbsp; &nbsp;
						<input type="radio" name="edtAdmin" value="2"/>Usuario Comum
					</div>

					<div class="col-sm-12" style="padding-top: 20px;">
						<input type='submit' name='edtSalvar' style="float: right" value="Cadastrar Usuario" class="btn btn-primary col-sm-4">
					</div>
				</div>
			</fieldset>
		</form>

		<br>
		<form action="" method="post">		
			<table class="bk" width="100%">
				<tr>
					<th>Nome</th>
					<th>Login</th>
					<th>Tipo de usuário</th>
				</tr>

				<?php 
					$buscarUsuario = $dtibd->executarQuery("select","SELECT * FROM usuario");
					
					foreach ($buscarUsuario as $result) {
				?>
					<tr>
						<td class="tdPers"><?php echo $result['usuario'];?></td>
						<td class="tdPers"><?php echo $result['login'];?></td>
						<td class="tdPers"><?php echo Usuario::tipoUsuario($result['isAdmin']);?></td>
					</tr>
				<?php 
					}
				?>
			</table>
		</form>
	</div>
</div>

<?php
	include 'footer.php';
?>