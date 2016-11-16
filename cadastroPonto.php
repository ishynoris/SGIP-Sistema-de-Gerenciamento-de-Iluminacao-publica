<?php 
	include 'header.php'; 
	include ('classes/pontoIluminacao.class.php');

	if(isset($_POST['edtSalvar'])){		
		$address = $_POST['logradouro'] . "," . $_POST['numPredialProx'] . " - " . $_POST['bairro'] . " " . $_POST['complemento'] . " ". $_POST['cidade'] . "/" . $_POST['uf'];
		$address = str_replace(" ", "+", $address);
		$region = "Brasil";	
		$endereco = $_POST['logradouro'] . "," . $_POST['numPredialProx'] . " - " . $_POST['bairro'] . " " . $_POST['complemento'] . " " . $_POST['cidade'] . "/" . $_POST['uf'];
		$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
		$json = json_decode($json);
		$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
		$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

		// Inserção do Ponto de Iluminação
		$pontoiluminacao = new pontoiluminacao;
		$pontoiluminacao->logradouro = $endereco;
		$pontoiluminacao->statusConservacao = $_POST['statusConservacao'];
		$pontoiluminacao->numeroDaPlaca = $_POST['numeroDaPlaca'];
		$utilmaIdInserida = $pontoiluminacao->salvarPontoIluminacao();

		// Caracteristicas do Ponto Iluminacao
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
		$pontoiluminacao->imagem = "data/".$_FILES['arquivo']['name'];
		$pontoiluminacao->observacoes = $_POST['edtObservacoes'];
		$pontoiluminacao->salvarCaracteristicasPontoIluminacao($utilmaIdInserida);
		
		// Ponto no mapa
		$pontoiluminacao->pontosmapa($lat,$long,"restaurant");
	}
?>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 
?>

	<div class="col-sm-10" style="margin-right: 0;margin-top: 20px">
		<form action="" class="bk clear"  style="padding: 20px " method="POST" enctype="multipart/form-data">
			<h1>Cadastrar Ponto de Iluminação</h1>
			<fieldset>
				<div class="col-sm-12" style="margin: 0 auto">
					<legend>Informações</legend>
					<div class="col-sm-6">
						<label>UF</label><select id="estado" name="uf" class="form-control " required/></select><br>
					</div>

					<div class="col-sm-6">
						<label>Cidade</label><select id="cidade" name="cidade" class="form-control " required/></select><br>
					</div>

					<div class="col-sm-3">
						<label>Rua</label><input type="text" name="logradouro" class="form-control " required/><br>
					</div>

					<div class="col-sm-3">
						<label>Numero</label><input type="text" name="numPredialProx" class="form-control " required/><br>	
					</div>

					<div class="col-sm-3">
						<label>Bairro</label><input type="text" name="bairro" class="form-control " required/><br>
					</div>

					<div class="col-sm-3">
						<label>Complemento</label><input type="text" name="complemento" class="form-control " /><br>
					</div>
					

					<div class="col-sm-6">
						<label>Status de Conservação</label>
						<select name="statusConservacao" class="form-control " required>
							<option>Bom</option>
							<option>Rasoavel</option>
							<option>Ruim</option>
						</select>
					</div>

					<div class="col-sm-6">
						<label>Numero da Placa</label><input type="text" name="numeroDaPlaca" class="form-control " required/><br>	
					</div>

					<legend>Característica</legend>

					<div class="col-sm-3">
						<label>Tamanho do Poste</label><input type="text" name="tamanhoDoPoste" class="form-control " required/><br>	
					</div>

					<div class="col-sm-3">
						<label>Tipo do Poste</label>
						<select name="tipoPoste" class="form-control alinhaSelect" required>
							<option></option>
							<option>Circular</option>
							<option>Poste DT</option>
						</select>
					</div>	

					<div class="col-sm-3">
						<label>Relé</label><input type="text" name="refrator" class="form-control " required/><br>	
					</div>

					<div class="col-sm-3">
						<label>Tipo do Reator</label>
						<select name="tipoReator" class="form-control alinhaSelect" required>
							<option></option>
							<option>Vapor de sódio</option>
							<option>Vapor metálico</option>
							<option>Misto</option>
						</select>
					</div>

					<div class="col-sm-3">
						<label>Modelo do Reator</label>
						<select name="modeloReator" class="form-control alinhaSelect" required>
							<option></option>
							<option>Interno</option>
							<option>Externo</option>
						</select>
					</div>				

					<div class="col-sm-3">
						<label>Potencia do Reator</label>
						<select name="potenciaDoReator" class="form-control alinhaSelect" required>
							<option></option>
							<option value"70">70</option>
							<option value"150">150</option>
							<option value"250">250</option>
							<option value"400">400</option>
						</select>
					</div>	

					<div class="col-sm-3">
						<label>Tamanho do Braço</label>
						<select name="modeloBraco" class="form-control alinhaSelect" required>
							<option>1</option>
							<option>2.5</option>
							<option>3</option>
							<option>5</option>
						</select>
					</div>

					<div class="col-sm-3">
						<label>Modelo da Luminaria</label>
						<select name="modeloLuminaria" class="form-control alinhaSelect" required>
							<option></option>
							<option>Aberta</option>
							<option>Fechada</option>
							<option>Pétala</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label>Tipo da Luminaria</label>
						<select name="potenciaLuminaria" class="form-control alinhaSelect" required>
							<option></option>
							<option value"Bocal E-27">Bocal E-27</option>
							<option value"Bocal E-40">Bocal E-40</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label>Tipo da Lampada</label>
						<select name="tipoLampada" class="form-control alinhaSelect" required>
							<option></option>
							<option>Vapor de sódio</option>
							<option>Vapor metálico</option>
							<option>Vapor de mercúrio</option>
							<option>LED</option>
							<option>Misto</option>
						</select>
					</div>

					<div class="col-sm-4">
						<label>Potencia da Lampada</label>
						<select name="potenciaLampada" class="form-control alinhaSelect" required>
							<option></option>
							<option value"75">75</option>
							<option value"150">150</option>
							<option value"250">250</option>
							<option value"400">400</option>
						</select>
					</div>	

					<div class="col-sm-6">	
						<label for="file" class="btn btn-success"><i class="fa fa-camera" aria-hidden="true"></i></label>
						<input type="file" name="arquivo" style="display: none;" id="file">

						<?php
							if (isset($_FILES['arquivo'])) {
								if (is_file($_FILES['arquivo']['tmp_name'])) {
									$arquivo = $_FILES['arquivo']['tmp_name'];
									$caminho = "data/";
									$caminho = $caminho.$_FILES['arquivo']['name'];

									if (!(preg_match("/.php$/i", $_FILES['arquivo']['name']))){
										move_uploaded_file($arquivo,$caminho) or
										die("<p>Erro durante a manipulação do arquivo '$arquivo'</p>".'<p><a href="'.$_SERVER["PHP_SELF"].'">Voltar</a></p>');							
									} else {
										print "<h4><font color='#FF0000'><center>Caminho ou nome de arquivo Inv&aacute;lido!</center></font></h4>";
									}
								}							
							} 
						?>	
					</div>

					<div class="col-sm-6">
						<textarea name="edtObservacoes" class="form-control"></textarea>
					</div>

					<div class="col-sm-12" style="padding-top: 20px;">
						<input type='submit' name='edtSalvar' style="float: right" value="Adicionar Ponto de Iluminação" class="btn btn-primary col-sm-4">
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>

<?php
	include 'footer.php';
?>
