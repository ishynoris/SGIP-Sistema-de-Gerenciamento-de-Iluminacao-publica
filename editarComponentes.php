<?php 
	include 'header.php'; 
	include ('classes/componente.class.php');

	$id = $_GET['id'];

	if(isset($_POST['edtSalvar'])){
		$componente = new componente;
		$componente->marca = $_POST['marca'];
		$componente->fabricante = $_POST['fabricante'];
		$componente->numeroSerie = $_POST['numeroSerie'];
		$componente->tipoComponente = $_POST['tipoComponente'];
		$componente->quantidade = $_POST['quantidade'];
		$componente->dataFabricante = $_POST['dataFabricacao'];
		$componente->editarComponente($id);

		header("location: componentes.php");
	}

	$buscaProdutos = $dtibd->executarQuery("select","SELECT * FROM componentes where id = $id");


	foreach ((array) $buscaProdutos as $result) {
?>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 
?>

	<div class="col-sm-10" style="margin-right: 0;margin-top: 20px">
		<form action="" class="bk clear"  style="padding: 20px " method="POST">
			<h1>Cadastrar Novo Componente</h1>
			<fieldset>
				<div class="col-sm-12" style="margin: 0 auto">
					<div class="col-sm-4">
						<label>Marca</label><input type="text" name="marca" value="<?php echo $result['marca']; ?>" class="form-control " /><br>
					</div>
						
					<div class="col-sm-4">
						<label>Fabricante</label><input type="text" name="fabricante" value="<?php echo $result['fabricante']; ?>" class="form-control " /><br>
					</div>

					<div class="col-sm-4">
						<label>Numero de Serie</label><input type="text" name="numeroSerie" value="<?php echo $result['numeroSerie']; ?>" class="form-control"  /><br>
					</div>

					<div class="col-sm-4">
						<label>Tipo do Componente</label>
						<input type="text" name="tipoComponente" value="<?php echo $result['tipoComponente']; ?>" class="form-control " /><br>
					</div>	

					<div class="col-sm-4">
						<label>Quantidade</label><input type="text" name="quantidade" value="<?php echo $result['quantidade']; ?>" class="form-control " /><br>
					</div>	

					<div class="col-sm-4">
						<label>Data de Fabricação</label><input type="date" value="<?php echo date('Y-m-j',$result['dataFabricacao']); ?>" name="dataFabricacao" class="form-control " /><br>
					</div>

					<div class="col-sm-12" style="padding-top: 20px;">
						<input type='submit' name='edtSalvar' style="float: right" value="Cadastrar Componentes" class="btn btn-primary col-sm-4">
					</div>
				</div>
			</fieldset>
		</form>	
		<?php 
			}
		?>	
	</div>

	
</div>

<?php
	include 'footer.php';
?>
