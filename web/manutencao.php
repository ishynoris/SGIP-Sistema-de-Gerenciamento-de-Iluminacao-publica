<?php 
	include 'header.php'; 
	include ('classes/manutencao.class.php');

	if(isset($_POST['edtSalvar'])){
		$manutencao = new manutencao();
		$manutencao->nomeSolicitante = $_POST['nomeSolicitante'];
		$manutencao->contato = $_POST['contato'];
		$manutencao->email = $_POST['email'];
		$manutencao->tipoServico = $_POST['tipoServico'];
		$manutencao->prioridade = $_POST['prioridade'];
		$manutencao->observacoes = $_POST['observacao'];
		$manutencao->localdeDestino = $_POST['pontoIluminacao'];
		$manutencao->ocorrencia = $_POST['ocorrencia'];
		$manutencao->localdePartida = "Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais";
		$manutencao->inserirManutencao();
		$manutencao->atualizarOcorrencia($_POST['ocorrencia']);
	}
?>

<div class="row col-sm-12" style="padding-left:0;">

<?php 
	include 'menu.php'; 


	$resultado = $dtibd->executarQuery("select","SELECT * FROM pontoiluminacao");

	foreach ($resultado as $key) {
		@$option .= "<option value='".$key['logradouro']."'>".$key['logradouro']."</option>";
	}

	$atendimentos = $dtibd->executarQuery("select","SELECT * FROM ocorrencia");

	foreach ($atendimentos as $key) {
		@$ocorrencia .= "<option value='".$key['numeroProtocolo']."'>".$key['numeroProtocolo']."</option>";
	}

?>


<div class="col-sm-10" style="margin-right: 0;margin-top: 20px">
	<form action="" class="bk clear"  style="padding: 20px " method="POST">
		<h1>Manutenção</h1>
		<fieldset>
			<div class="col-sm-12" style="margin: 0 auto">
				<div class="col-sm-12">
					<label>Ponto de Iluminação</label>
					<select name="pontoIluminacao" class="form-control " required >
						<option></option>
						<?php echo $option; ?>
					</select>
				</div>
					
				<div class="col-sm-4">
					<label>Tecnico Responsavel</label><input type="text" name="nomeSolicitante" class="form-control " required /><br>
				</div>

				<div class="col-sm-4">
					<label>Contato</label><input type="text" name="contato" class="form-control " required /><br>
				</div>

				<div class="col-sm-4">
					<label>Email</label><input type="text" name="email" class="form-control " required /><br>
				</div>

				<div class="col-sm-4">
					<label>Tipo do Serviço</label>
					<select name="tipoServico" class="form-control " required >
						<option>Troca de Lampada</option>
						<option>Troca de Reator</option>
						<option>Troca de Base</option>
						<option>Troca de Relé</option>
						<option>Troca de Conector</option>
						<option>Troca de Fiação</option>
						<option>Troca de Braço</option>
						<option>Troca de Luminaria</option>
					</select>
				</div>

				<div class="col-sm-4">
					<label>Prioridade</label>
					<select name="prioridade" class="form-control alinhaSelect" required >
						<option></option>
						<option>Normal</option>
						<option>Urgente</option>
					</select>
				</div>

				<div class="col-sm-4">
					<label>Protocolo de Atendimento</label>
					<select name="ocorrencia" class="form-control " required >
						<option></option>
						<?php echo $ocorrencia; ?>
					</select>
				</div>	

				
				<div class="col-sm-12">
					<label>Observação</label>
					<textarea name="observacao" class="form-control" placeholder="Descrever o serviço, ex:'queimado, curto, quebrado ou danificado'"></textarea>
				</div>			

				<div class="col-sm-12" style="padding-top: 20px;">
					<input type='submit' name='edtSalvar' style="float: right" value="Requerer Serviço" class="btn btn-primary col-sm-4">
				</div>
			</div>
		</fieldset>

		
	</form>

	<br>

	<table class="bk" id="tabela" border="0" cellspacing="0" width="100%" >
		<tr>
			<th>Tecnico Responsavel</th>
			<th>Tipo do Serviço</th>
			<th>Logradouro</th>
			<th>Prioridade</th>
			<th>Opções</th>
		</tr>

		<tr>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna1" placeholder="Filtrar por Tecnico"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna2" placeholder="Filtrar por Tipo"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna3" placeholder="Filtrar por Logradouro"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna4" placeholder="Filtrar por Prioridade"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "></th>
		</tr>

		<?php 
		$busca = $dtibd->executarQuery("select","SELECT * FROM manutencao");

		
		foreach ((array) $busca as $result) {
			$codigo = $result['id'];			
		?>
		<tr>
			<td class="tdPers"><?php echo $result['nomeSolicitante']; ?></td>
			<td class="tdPers"><?php echo $result['tipoServico']; ?></td>
			<td class="tdPers"><?php echo $result['localdeDestino']; ?></td>
			<td class="tdPers"><?php echo $result['prioridade']; ?></td>
			<td class="tdPers"><a href="tracarRota.php?origem=<?php echo urlencode($result['localdePartida']);?>&destino=<?php echo urlencode($result['localdeDestino']); ?>" class="btn btn-success">Traçar Rota</a></td>
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
