<?php 
	include ('classes/pontoIluminacao.class.php');
	$id = $_GET['id'];

	if(isset($_POST['edtEditar'])){
		$pontoiluminacao = new pontoiluminacao;
		$pontoiluminacao->tamanhoDoPoste = $_POST['tamanhoDoPoste'];
		$pontoiluminacao->refrator = $_POST['refrator'];
		$pontoiluminacao->tipoPoste = $_POST['tipoPoste'];
		$pontoiluminacao->modeloReator = $_POST['modeloReator'];
		$pontoiluminacao->tipoReator = $_POST['tipoReator'];
		$pontoiluminacao->potenciaDoReator = $_POST['potenciaDoReator'];
		$pontoiluminacao->modeloBraco = $_POST['modeloBraco'];
		$pontoiluminacao->modeloLuminaria = $_POST['modeloLuminaria'];
		$pontoiluminacao->potenciaLuminaria = $_POST['potenciaLuminaria'];
		$pontoiluminacao->tipoLampada = $_POST['tipoLampada'];
		$pontoiluminacao->potenciaLampada = $_POST['potenciaLampada'];
		$pontoiluminacao->editarPI($id);

		header("location: parquedeiluminacao.php");
	}


	include 'header.php'; 
?>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 

	$buscar = $dtibd->executarQuery("select","SELECT * FROM pontoiluminacao p JOIN caracteristicaspontoiluminacao cpi on cpi.idPontoIluminacao = p.id
	WHERE p.id = $id");

	foreach ((array) $buscar as $result) {
?>
	<form action="" method="POST">
		<div class="col-sm-10 bk" style="margin-right: 0;margin-top: 20px;padding: 20px;">
			<div class="col-sm-12" style="margin: 0 auto">
				<legend>Informações</legend>
				<div class="col-sm-12">
					<label>Logradouro</label><input type="text" name="logradouro" class="form-control" value="<?php echo $result['logradouro']; ?>" readonly/><br>
				</div>
					
				<div class="col-sm-6">
					<label>Status de Conservação</label>
					<input type="text" name="statusConservacao" class="form-control" value="<?php echo $result['statusConservacao']; ?>" readonly>
					</select>
				</div>

				<div class="col-sm-6">
					<label>Numero da Placa</label><input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['numeroDaPlaca']; ?>" readonly/><br>	
				</div>

				<legend>Característica</legend>

				<div class="col-sm-3">
					<label>Tamanho do Poste</label><input type="text" name="tamanhoDoPoste" class="form-control " value="<?php echo $result['tamanhoDoPoste']; ?>" /><br>	
				</div>

				<div class="col-sm-3">
					<label>Refrator</label><input type="text" name="refrator" class="form-control " value="<?php echo $result['refrator']; ?>" /><br>	
				</div>

				<div class="col-sm-3">
					<label>Tipo do Reator</label>
					<input type="text" name="tipoReator" class="form-control " value="<?php echo $result['tipoReator']; ?>" /><br>	
				</div>			

				<div class="col-sm-3">
					<label>Potencia do Reator</label>
					<input type="text" name="potenciaDoReator" class="form-control " value="<?php echo $result['potenciaDoReator']; ?>" /><br>	
				</div>	

				<div class="col-sm-3">
					<label>Modelo do Braço</label>
					<input type="text" name="modeloBraco" class="form-control " value="<?php echo $result['modeloBraco']; ?>" /><br>	
				</div>

				<div class="col-sm-3">
					<label>Modelo da Luminaria</label>
					<input type="text" name="modeloLuminaria" class="form-control " value="<?php echo $result['modeloLuminaria']; ?>" /><br>	
				</div>

				<div class="col-sm-3">
					<label>Potencia da Luminaria</label>
					<input type="text" name="potenciaLuminaria" class="form-control " value="<?php echo $result['potenciaLuminaria']; ?>" /><br>	
				</div>

				<div class="col-sm-3">
					<label>Tipo da Lampada</label>
					<input type="text" name="tipoLampada" class="form-control " value="<?php echo $result['tipoLampada']; ?>" /><br>	
				</div>

				<div class="col-sm-4">
					<label>Potencia da Lampada</label>
					<input type="text" name="potenciaLampada" class="form-control " value="<?php echo $result['potenciaLampada']; ?>" /><br>	
				</div>

				<div class="col-sm-4">
					<label>Tipo do Poste</label>
					<input type="text" name="tipoPoste" class="form-control " value="<?php echo $result['tipoPoste']; ?>" /><br>	
				</div>

				<div class="col-sm-4">
					<label>Modelo do Reator</label>
					<input type="text" name="modeloReator" class="form-control " value="<?php echo $result['modeloReator']; ?>" /><br>	
				</div>

				<input type="submit" value="Salvar" name="edtEditar" class="btn btn-success"/>

			</div>
		</div>
	</form>
	<?php
		}
	?>
</div>