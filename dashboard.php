<?php 
	include 'header.php';

	if(isset($_POST['btnRelatorio'])){
		@$caminho = $_POST['edtRelatorio'];

		header("location: ". $caminho . "");
	}
?>

<div class="row">

<?php include 'menu.php'; ?>

	<div class="col-sm-9"> 

	<h1 class="legend" style="font-size: 30px;">Relatorios</h1>
		<form method="post" action="">
			<div class="col-sm-12" style="min-height: 300px;">
				<select name="edtRelatorio" class="form-control" style="width: 90%;float: left;">
					<option value="relatorioManutencao.php">Manutenção</option>
					<option value="relatorioOcorrencia.php">Ocorrencia</option>
					<option value="relatoriosComponente.php">Componente</option>
				</select>

				<input type="submit" class="btn btn-success" style="float: right" value="Visualizar" name="btnRelatorio">
			</div>
		</form>
		

		
	</div>
</div>
