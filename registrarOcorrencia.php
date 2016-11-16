<?php 
	include 'header.php'; 
	include ('classes/ocorrencia.class.php');

	if(isset($_POST['edtSalvar'])){
		$endereco = $_POST['logradouro'] . "," . $_POST['numPredialProx'] . " - " . $_POST['bairro'] . " " . $_POST['complemento'] . $_POST['cidade'] . "/" . $_POST['uf'];
		$ocorrencia = new ocorrencia;
		$ocorrencia->numeroProtocolo = 2016 . rand(11111,99999);
		$ocorrencia->status = "Aberta";
		$ocorrencia->data = date('d/m/Y'); 
		$ocorrencia->prazo = date('d/m/Y', strtotime(' + 5 days'));
		$ocorrencia->nomeMunicipe = $_POST['nomeMunicipe'];
		$ocorrencia->contato = $_POST['contato'];
		$ocorrencia->enderecoMunicipe = $endereco;
		$ocorrencia->descricao = $_POST['descricaoOcorrencia'];
		$ocorrencia->cpf = $_POST['cpf'];
		$ocorrencia->email = $_POST['email'];
		$ocorrencia->cadastrarOcorrencia();

		if ($_SESSION['isAdmin'] != 0){ 
			echo "<script type='text/javascript'> alert('Seu Atendimento foi Registrado com Sucesso. Seu numero de Protocolo é $ocorrencia->numeroProtocolo');</script>";
		}
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
				<legend>Informações</legend>
				<div class="col-sm-8">
					<label>Nome do Municípe</label><input type="text" name="nomeMunicipe" class="form-control " required/><br>	
				</div>

				<div class="col-sm-4">
					<label>Contato</label><input type="text" name="contato" class="form-control " required/><br>	
				</div>
				
				<div class="col-sm-3">
					<label>Email</label><input type="text" name="email" class="form-control " /><br>
				</div>
				
				<div class="col-sm-3">
					<label>CPF</label><input type="text" name="cpf" class="form-control " required /><br>
				</div>

				<div class="col-sm-3">
					<label>UF</label><select id="estado" name="uf" class="form-control " required/></select><br>
				</div>

				<div class="col-sm-3">
					<label>Cidade</label><select id="cidade" name="cidade" class="form-control " required/></select><br>
				</div>

				<div class="col-sm-6">
					<label>Rua</label><input type="text" name="logradouro" class="form-control " required/><br>
				</div>

				<div class="col-sm-1">
					<label>Numero</label><input type="text" name="numPredialProx" class="form-control " required/><br>	
				</div>

				<div class="col-sm-3">
					<label>Bairro</label><input type="text" name="bairro" class="form-control " required/><br>
				</div>

				<div class="col-sm-2">
					<label>Complemento</label><input type="text" name="complemento" class="form-control "/><br>
				</div>				

				<div class="col-sm-12">
					<label>Descrição da Ocorrência</label><textarea name="descricaoOcorrencia" class="form-control" style="height: 150px;width: 100%" ></textarea>
				</div>
				

				<div class="col-sm-12" style="padding-top: 20px;">
					<input type='submit' name='edtSalvar' style="float: right" value="Registrar Ocorrencia" class="btn btn-primary col-sm-4">
				</div>
			</div>
		</fieldset>
	</form>

	<br>

	<div class="right">
		<form action="" method="post">		
	</div>
	<br><br>

	<?php if($_SESSION['isAdmin'] == 0){ ?>

	<table id="tabela" class="bk" width="100%">
		<tr>
			<th>Protocolo</th>
			<th>Status</th>
			<th>Data</th>
			<th>Prazo</th>
			<th>Nome do Municípe</th>
			<th>Endereco do Municípe</th>
		</tr>

		<tr>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna1" placeholder="Filtrar por Protocolo"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna2" placeholder="Filtrar por Status"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna3" placeholder="Filtrar por Data"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna4" placeholder="Filtrar por Prazo"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna5" placeholder="Filtrar por Municipe"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna6" placeholder="Filtrar por Endereco"/></th>
			<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "></th>
		</tr>

		<?php 
		$buscarOcorrencia = $dtibd->executarQuery("select","SELECT * FROM ocorrencia");
		
		foreach ($buscarOcorrencia as $result) {	
		?>

			<tr>
				<td class="tdPers"><?php echo $result['numeroProtocolo']; ?></td>
				<td class="tdPers"><?php echo $result['status']; ?></td>
				<td class="tdPers"><?php echo $result['data']; ?></td>
				<td class="tdPers"><?php echo $result['prazo']; ?></td>
				<td class="tdPers"><?php echo $result['nomeMunicipe']; ?></td>
				<td class="tdPers"><?php echo $result['enderecoMunicipe']; ?></td>
			</tr>
			<?php 
				}
			?>
		</table>
	<?php } ?>
	</form>
</div>
</div>

<?php
	include 'footer.php';
?>
