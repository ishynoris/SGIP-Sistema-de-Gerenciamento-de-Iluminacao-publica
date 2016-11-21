<?php 
	include 'header.php'; 
	include ('classes/ocorrencia.class.php');
	
	validateAcess();
	$protocol = generateProtocol();
	$currentDiv = 0;
	
	define("TIPO_MANUTENCAO", "manutencao");
	define("DESCRICAO", "descricao");
	define("RURAL", "area rural");
	define("CEP", "CEP");
	define("LOGRADOURO", "logradouro");
	define("NUMERO", "numero");
	define("COMPLEMENTO", "complemento");
	define("BAIRRO", "bairro");
	define("CIDADE", "cidade");
	define("UF", "UF");
	define("OBSERVACAO", "observacao");
	
	
	if(isset($_POST['btn-save'])){
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
<html>
	<head>
		<!--
		<noscript>  
			<meta http-equiv="Refresh" content="2; url=http://www.google.com.br">
		</noscript>
		-->
		<style>
			.hide{
				display: none;
			}
			.block-button {
				pointer-events: none;
			}
		</style>
		
		<script type="text/javascript" src="js/jquery.js"></script>
	 	<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/script-reg-ocorrencia.js"/></script>
	</head>
	<body onLoad="start()">

		<div class="row col-sm-12" style="padding-left:0;">
<?php 

	include 'menu.php'; 
?>
			<div class="col-sm-9" style="margin-top: 20px;">

				<form class="bk clear" style="padding: 30px " method="POST" enctype="multipart/form-data">
					<fieldset>			
						<div class="col-sm-12" >
							<legend style="margin-bottom: 50px">Cadastrar nova ocorrência</legend>
							
							<div class="alert" style="margin-bottom: 50px">
								<div style="padding-left: 30px;">
									<ul class="nav nav-pills" id="menu-list">
										<li role="presentation" id="li-0"><a href="">Passo 1</a></li>
										<li role="presentation" id="li-1"><a href="">Passo 2</a></li>
										<li role="presentation" id="li-2"><a href="">Passo 3</a></li>
										<li role="presentation" id="li-3"><a href="">Passo 4</a></li>
										<li role="presentation" id="li-4"><a href="">Final</a></li>
									</ul>
								</div>
								<div class="progress" style="margin: 40px; margin-bottom: 20px">
									<div id="progress-bar" class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
									</div>
								</div>
							</div>
							
							
							<!-- PASSO UM ------------------------------------------------------------------->
							<div id="step-0" class="hide">
								<div class="well well-lg">
									<h4>
									Este serviço tem como objetivo proporcionar ao cidadão de Ipatinga o encaminhamento de sua solicitação de reparos na iluminação pública (lâmpada apagada/quebrada e acesa durante o dia) de um determinado ponto de atendimento.
									<br/><br/>
									Se necessário você pode entrar em contato pelo telefone *inserir aqui o telefone*.
									<br/>
									</h4>
								</div>
							</div>
							
							<!-- PASSO DOIS ------------------------------------------------------------------->
							<div id="step-1" class="hide" >
								<form class="form-horizontal">
									<div class="form-group">
										<div class="row"  style="padding-right: 30px"> 
											<label class="col-sm-3 text-right">Nome</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" placeholder="<?php echo $_SESSION['usuario'] ?>" disabled>
											</div>
										</div><br/>
										<div class="row" style="padding-right: 30px"> 
											<label class="col-sm-3 text-right">Tipo de manutenção</label>
											<div class="dropdown col-sm-9">
												<!--name="TIPO_MANUTENCAO";-->
												<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
													Dropdown
													<span class="caret"></span>
												</button>
												<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
													<li><a href="#">Action</a></li>
													<li><a href="#">Another action</a></li>
													<li><a href="#">Something else here</a></li>
													<li role="separator" class="divider"></li>
													<li><a href="#">Separated link</a></li>
												</ul>
											</div>
										</div>
									</div>
								</form>
							</div>
							
							<!-- PASSO Tres ------------------------------------------------------------------->
							<div id="step-2" class="hide" >
								<form class="form-horizontal">
									<div class="form-group">
										<div class="row"  style="padding-right: 40px"> 
											<label class="col-sm-3 text-right">Numero de protocolo</label>
											<div class="col-sm-9">
												<input type="text" class="form-control" placeholder="<?php echo  "{$protocol} = function.php:generateProtocol()" ?>" disabled>
											</div>
										</div><br/>
										<div class="row" style="padding-right: 40px"> 
											<label class="col-sm-3 text-right">Descrição do problema</label>
											<div class="col-sm-9">
												<textarea name="DESCRICAO" class="form-control" rows="5"></textarea>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!-- PASSO QUATRO ------------------------------------------------------------------->
							<div id="step-3" class="hide" >
								<form class="form-horizontal">
									<div class="row" style="padding-right: 30px"> 
										<label class="col-sm-2 text-right">Área rural</label>
										<div class="col-sm-4">
											<input name="<?php RURAL ?>"type="text" class="form-control" >
										</div>
										<label class="col-sm-2 text-right">CEP</label>
										<div class="col-sm-2">
											<input name="<?php CEP ?>"type="text" class="form-control" >
										</div>
										<div class="col-sm-2" >
											<h5><span class="label label-primary" ><a target='_blank' href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm">Consultar CEP</a></span></h5>
										</div>
									</div><br/>
									
									<div class="row" style="padding-right: 30px"> 
										<label class="col-sm-2 text-right">Logradouro</label>
										<div class="col-sm-6">
											<input name="<?php LOGRADOURO ?>"type="text" class="form-control" >
										</div>
										<label class="col-sm-2 text-right"></label>
										<div class="col-sm-2">
											<input name="<?php echo NUMERO ?>"type="text" class="form-control" >
										</div>
									</div><br/>
															
									<div class="row" style="padding-right: 30px"> 
										<label class="col-sm-2 text-right">Complemento</label>
										<div class="col-sm-4">
											<input name="<?php COMPLEMENTO ?>"type="text" class="form-control" >
										</div>
										<label class="col-sm-2 text-right">Bairro</label>
										<div class="col-sm-4">
											<input name="<?php BAIRRO ?>"type="text" class="form-control" >
										</div>
									</div><br/>
									
									<div class="row" style="padding-right: 30px"> 
										<label class="col-sm-2 text-right">Cidade</label>
										<div class="col-sm-6">
											<input name="<?php CIDADE ?>"type="text" class="form-control" >
										</div>
										<label class="col-sm-2 text-right">UF</label>
										<div class="col-sm-2">
											<input name="<?php UF ?>"type="text" class="form-control" >
										</div>
									</div><br/>
									
									<div class="row" style="padding-right: 30px"> 
										<label class="col-sm-3 text-right">Observação sobre o endereço</label>
										<div class="col-sm-9">
											<textarea name="<?php OBSERVACAO ?>"class="form-control" rows="3"></textarea>
										</div>
									</div><br/>
								</form>
							</div>
							<!-- PASSO CINCO ------------------------------------------------------------------->
							<div id="step-4" class="hide" >
								<div class="alert alert-info" role="alert" style="padding: 40px; margin:40px;">
									Por favor, verifique todos os campos antes de prosseguir.
								</div>
								<div class="row"  style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Protocolo</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" placeholder="<?php echo "$protocol = function.php:generateProtocol()"?>" disabled>
									</div>
															
									<label class="col-sm-2 text-right">Nome</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" placeholder="<?php echo $_SESSION['usuario'] ?>" disabled>
									</div>
								</div><br/>
								
								<div class="row"  style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Manutenção</label>
									<div class="col-sm-6">
										<input type="text" class="form-control" placeholder="*Inserir o tipo de manutenção*" disabled>
									</div>
								</div><br/>
								
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Descrição do problema</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="5" disabled>*Inserir descriçao do problema*</textarea>
									</div>
								</div><br/>
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Área rural</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="*Sim ou não*" disabled>
									</div>
									<label class="col-sm-2 text-right">CEP</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="*Inserir CEP*" disabled>
									</div>
								</div><br/>
								
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Logradouro</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" placeholder="*Inserir logradouro*" disabled>
									</div>
									<label class="col-sm-2 text-right">Numero</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" placeholder="*Inserir numero*" disabled>
									</div>
								</div><br/>
														
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Complemento</label>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="*Inserir complemento*" disabled>
									</div>
									<label class="col-sm-2 text-right">Bairro</label>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="*Inserir bairro*" disabled>
									</div>
								</div><br/>
								
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Cidade</label>
									<div class="col-sm-5">
										<input type="text" class="form-control" placeholder="*Inserir cidade*" disabled>
									</div>
									<label class="col-sm-2 text-right">UF</label>
									<div class="col-sm-2">
										<input type="text" class="form-control" placeholder="*Inserir UF*" disabled>
									</div>
								</div><br/>
								
								<div class="row" style="padding-right: 30px"> 
									<label class="col-sm-3 text-right">Observação sobre o endereço</label>
									<div class="col-sm-9">
										<textarea class="form-control" rows="3" disabled>*Inserir observação sobre o endereço*</textarea>
									</div>
								</div><br/>
								
							</div>
							
							<!-- MENU DE NAVEGAÇÃO------------------------------------------------------------------------------->
							
							<div class="row" style="margin-top: 50px; padding-left: 100px; padding-right: 100px;">
								<ul class="nav nav-pills" id="menu-list">
									<a href="javascript:previous()" id="btn-previous" class="btn btn-sm" style="float: left"> &laquo; Voltar</a>
									<input type="submit" id="btn-save" name="btn-save" value="Registrar ocorrência"class="btn btn-sm btn-primary hide" style="float: right">
									<a href="javascript:next()" id="btn-next" class="btn btn-sm btn-primary" style="float: right">Avançar &raquo;</a>
								</ul>
							</div>
							
							<!--
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
							-->
						</div>
					</fieldset>
				</form><br><br><br>

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
	</body>
</html>