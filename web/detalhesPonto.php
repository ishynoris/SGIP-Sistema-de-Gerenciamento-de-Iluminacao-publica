<?php 
	include 'header.php'; 
	include ('classes/pontoIluminacao.class.php');
	$id = $_GET['id'];

?>
	<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 

	$buscar = $dtibd->executarQuery("select",
			"SELECT * FROM pontoiluminacao p
			 JOIN caracteristicaspontoiluminacao cpi on cpi.idPontoIluminacao = p.id
			 WHERE p.id = $id
			");

	foreach ((array) $buscar as $result) {
		$codigo = $result['id'];

?>

	<div class="col-sm-10 bk" style="margin-right: 0;margin-top: 20px;padding: 20px;">
		<div class="col-sm-12" style="margin: 0 auto">
			<legend>Informações</legend>

			<div class="col-sm-12">
				<img src="<?php echo $result['imagem']; ?>" width="300px"/>
			</div>
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

			<div class="col-sm-4">
				<label>Tamanho do Poste</label><input type="text" name="tamanhoDoPoste" class="form-control " value="<?php echo $result['tamanhoDoPoste']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Refrator</label><input type="text" name="refrator" class="form-control " value="<?php echo $result['refrator']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Tipo do Reator</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['tipoReator']; ?>" readonly/><br>	
			</div>			

			<div class="col-sm-4">
				<label>Potencia do Reator</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['potenciaDoReator']; ?>" readonly/><br>	
			</div>	

			<div class="col-sm-4">
				<label>Modelo do Braço</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['modeloBraco']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Modelo da Luminaria</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['modeloLuminaria']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Potencia da Luminaria</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['potenciaLuminaria']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Tipo da Lampada</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['tipoLampada']; ?>" readonly/><br>	
			</div>

			<div class="col-sm-4">
				<label>Potencia da Lampada</label>
				<input type="text" name="numeroDaPlaca" class="form-control " value="<?php echo $result['potenciaLampada']; ?>" readonly/><br>	
			</div>

			<a href="parque-de-iluminacao.php" class="btn btn-primary">Voltar</a>
		</div>
	</div>

	<?php
		}
	?>