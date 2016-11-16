<?php 
	include 'header.php'; 
	include ('classes/componente.class.php');

	if(isset($_POST['edtSalvar'])){
		$componente = new componente;
		$componente->marca = $_POST['marca'];
		$componente->fabricante = $_POST['fabricante'];
		$componente->numeroSerie = $_POST['numeroSerie'];
		$componente->tipoComponente = $_POST['tipoComponente'];
		$componente->quantidade = $_POST['quantidade'];
		$componente->dataFabricante = $_POST['dataFabricacao'];
		$componente->cadastrarComponente();
	}
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
						<label>Marca</label><input type="text" name="marca" class="form-control " required/><br>
					</div>
						
					<div class="col-sm-4">
						<label>Fabricante</label><input type="text" name="fabricante" class="form-control " required/><br>
					</div>

					<div class="col-sm-4">
						<label>Numero de Serie</label><input type="text" name="numeroSerie" class="form-control " required/><br>
					</div>

					<div class="col-sm-4">
						<label>Tipo do Componente</label>
						<select name="tipoComponente" class="form-control " required>
							<option>Lampada</option>
							<option>Relé</option>
							<option>Braço</option>
							<option>Luminaria</option>
							<option>Reator</option>
						</select>
					</div>	

					<div class="col-sm-4">
						<label>Quantidade</label><input type="text" name="quantidade" class="form-control " required/><br>
					</div>	

					<div class="col-sm-4">
						<label>Data de Fabricação</label><input type="date" name="dataFabricacao" class="form-control " required/><br>
					</div>

					<div class="col-sm-12" style="padding-top: 20px;">
						<input type='submit' name='edtSalvar' style="float: right" value="Cadastrar Componentes" class="btn btn-primary col-sm-4">
					</div>
				</div>
			</fieldset>
		</form>	

		<br><br>

		<table class="bk" width="100%">
			<tr>
				<th>Marca</th>
				<th>Tipo do Componente</th>
				<th>Quantidade</th>
				<th>Data de Fabricação</th>
				<th>Opções</th>
			</tr>

			<?php 
			$buscaProdutos = $dtibd->executarQuery("select","SELECT * FROM componentes");

		
			foreach ((array) $buscaProdutos as $result) {
			?>
			<tr>
				<td class="tdPers"><?php echo $result['marca']; ?></td>
				<td class="tdPers"><?php echo $result['tipoComponente']; ?></td>
				<td class="tdPers"><?php echo $result['quantidade']; ?></td>
				<td class="tdPers"><?php echo $result['dataFabricante']; ?></td>
				<td class="tdPers">
					<a href="detalhesCompontentes.php?id=<?php echo $result['id']; ?>" class="btn btn-success"><i class="fa fa-search-plus" aria-hidden="true"></i></a>
					<a href="editarComponentes.php?id=<?php echo $result['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
				</td>
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
