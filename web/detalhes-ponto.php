<?php 
	include 'header.php'; 
	include 'menu-top.php'; 
	include 'controller/PontoIluminacaoController.class.php';

	$placa = $_GET['pid'];
    $uid = $_SESSION['id'];

	if(empty($placa) || empty($uid)){
		header("Location: index.php");
		exit;
	}
?>
	<style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
    </style>
	<div class="row">
<?php 
	
	include 'menu-left.php';

    $controller = new PontoIluminacaoController();
	$pontoIluminacao = $controller->getDetails($placa);
?>	
		<div class="col-sm-10" >
			<!-- Detalhes do ponto de iluminação -->
            <div class="bk line">

				<legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-info-sign">
					</span>&nbsp;&nbsp;&nbsp;Detalhes do ponto de iluminação</legend>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Status de conservação</label>
					<div class="col-sm-2" >
						<input type="text" value="<?php echo $controller->getStatus($pontoIluminacao[0]['statusConservacao'])?>" class="form-control" disabled>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">

					<label class="col-sm-2 text-right">Tamanho</label>
					<div class="col-sm-2" >
						<input type="text" value="<?php echo $pontoIluminacao[0]['tamanhoDoPoste'] ?>" class="form-control" disabled>
					</div>
					<label class="col-sm-2 text-right">Numero</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $placa ?>" class="form-control" disabled>
					</div>
					<label class="col-sm-2 text-right">Tipo do poste</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['tipoPoste'] ?>" class="form-control" disabled>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					
					<label class="col-sm-2 text-right">Relé</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['rele'] ?>" class="form-control" disabled>
					</div>
					<label class="col-sm-2 text-right">Tipo da lâmpada</label>
					<div class="col-sm-2" >
						<input type="text" value="<?php echo $pontoIluminacao[0]['tipoLampada'] ?>" class="form-control" disabled>
					</div>

					<label class="col-sm-2 text-right">Potência da lâmpada (W)</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['potenciaLampada'] ?>" class="form-control" disabled>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Tipo da luminária</label>
					<div class="col-sm-2" >
						<input type="text" value="<?php echo $pontoIluminacao[0]['tipoLuminaria'] ?>" class="form-control" disabled>
					</div>
					<label class="col-sm-2 text-right">Modelo da luminária</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['modeloLuminaria'] ?>" class="form-control" disabled>
					</div>
					<label class="col-sm-2 text-right">Tamanho do braço (m)</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['modeloBraco'] ?>" class="form-control" disabled>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">

					<label class="col-sm-2 text-right">Tipo do reator</label>
					<div class="col-sm-2" >
						<input type="text" value="<?php echo $pontoIluminacao[0]['tipoReator'] ?>" class="form-control" disabled>
					</div>

					<label class="col-sm-2 text-right">Modelo do reator</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['modeloReator'] ?>" class="form-control" disabled>
					</div>

					<label class="col-sm-2 text-right">Potencia do reator</label>
					<div class="col-sm-2">
						<input type="text" value="<?php echo $pontoIluminacao[0]['potenciaDoReator'] ?>" class="form-control" disabled>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Observação sobre o ponto de iluminação</label>
					<div class="col-sm-10" style="float: right">
						<textarea class="form-control" rows="5" disabled><?php echo $pontoIluminacao[0]['observacoes'] ?></textarea>
					</div>
				</div>
			</div>
			<!-- Detalhes do Endereço -->
			<div class="bk" style="padding: 30px; margin: 20px 20px 0px 50px;">
				<legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-info-sign">
					</span>&nbsp;&nbsp;&nbsp;Detalhes do endereço</legend>
					<div class="row" style="padding-right: 30px">
						<label class="col-sm-2 text-right">CEP</label>
						<div class="col-sm-3" >
							<input type="text" value="<?php echo $pontoIluminacao[0]['cep'] ?>" class="form-control" disabled>
						</div>
					</div><br/>
					<div class="row" style="padding-right: 30px">
						<label class="col-sm-2 text-right">Logradouro</label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo $pontoIluminacao[0]['logradouro'] ?>" class="form-control" disabled>
						</div>
						<label class="col-sm-1 text-right">Numero</label>
						<div class="col-sm-2">
							<input type="text" value="<?php echo $pontoIluminacao[0]['numPredialProx'] ?>" class="form-control" disabled>
						</div>
					</div><br/>
					<div class="row" style="padding-right: 30px">
						<label class="col-sm-2 text-right">Complemento</label>
						<div class="col-sm-5">
							<input type="text" value="<?php echo $pontoIluminacao[0]['complemento'] ?>" class="form-control" disabled>
						</div>
						<label class="col-sm-1 text-right" >Bairro</label>
						<div class="col-sm-4">
							<input type="text" value="<?php echo $pontoIluminacao[0]['bairro'] ?>" class="form-control" disabled>
						</div>
					</div><br/>

					<div class="row" style="padding-right: 30px">
						<label class="col-sm-2 text-right">Cidade</label>
						<div class="col-sm-7">
							<input type="text" value="<?php echo $pontoIluminacao[0]['cidade'] ?>" class="form-control" disabled>
						</div>
						<label class="col-sm-1 text-right">UF</label>
						<div class="col-sm-2">
							<input type="text" value="<?php echo $pontoIluminacao[0]['uf'] ?>" class="form-control" disabled>
						</div>
					</div><br/>
					<div class="row" style="padding-right: 30px">
						<label class="col-sm-2 text-right">Observação sobre o endereço</label>
						<div class="col-sm-10" style="float: right">
							<textarea class="form-control" rows="5" disabled><?php echo $pontoIluminacao[0]['observacao'] ?></textarea>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>