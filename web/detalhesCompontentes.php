<?php 
	include 'header.php'; 
	include ('classes/componente.class.php');

	$id = $_GET['id'];

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
						<label>Marca</label><input type="text" name="marca" value="<?php echo $result['marca']; ?>" class="form-control " readonly/><br>
					</div>
						
					<div class="col-sm-4">
						<label>Fabricante</label><input type="text" name="fabricante" value="<?php echo $result['fabricante']; ?>" class="form-control " readonly/><br>
					</div>

					<div class="col-sm-4">
						<label>Numero de Serie</label><input type="text" name="numeroSerie" value="<?php echo $result['numeroSerie']; ?>" class="form-control"  readonly/><br>
					</div>

					<div class="col-sm-4">
						<label>Tipo do Componente</label>
						<input type="text" name="tipoComponente" value="<?php echo $result['tipoComponente']; ?>" class="form-control " readonly/><br>
					</div>	

					<div class="col-sm-4">
						<label>Quantidade</label><input type="text" name="quantidade" value="<?php echo $result['quantidade']; ?>" class="form-control " readonly/><br>
					</div>	

					<div class="col-sm-4">
						<label>Data de Fabricação</label><input type="date" value="<?php echo $result['dataFabricacao']; ?>" name="dataFabricacao" class="form-control " readonly/><br>
					</div>
				</div>

				<a href="componentes.php" class="btn btn-success">Voltar</a>
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
