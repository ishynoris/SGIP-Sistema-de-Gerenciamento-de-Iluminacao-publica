<?php 
	include 'header.php'; 
	include 'menu-top.php'; 
	include 'controller/PontoIluminacaoController.class.php';

	$placa = $_GET['pid'];
    $uid = $_SESSION['id'];
	
    $controller = new PontoIluminacaoController();
	$controller->triggerInput($controller->getInputAction());
	$index = 2;
	$value = "CIRCULAR";

	if(empty($placa) || empty($uid)){
		header("Location: index.php");
		exit;
	} else
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

	$pontoIluminacao = $controller->getDetails($placa);
	if(empty($pontoIluminacao[0])){
?>
		<div class="col-sm-10">
			<div class="bk line">
				<legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-remove">
					</span>&nbsp;&nbsp;&nbsp;Ocorreu um erro</legend>
					
        		<div class="wrapper alert alert-danger" role="alert">
					Ocorreu um erro interno e devido a isso, não podemos exibir o registro. Entre em contato com um resposável.
				</div>
			</div>
		</div>
<?php 	
	} else {
?>	
		<div class="col-sm-10">
			<!-- Detalhes do ponto de iluminação -->
            <form class="bk line" method="post">
				<legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-pencil">
				
					</span>&nbsp;&nbsp;&nbsp;Editar ponto de iluminação</legend>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Status de conservação</label>
					<div class="col-sm-2">
						 <select name="conservacao" class="form-control">
							<option class="form-control" value="BOM" 
								<?php echo $pontoIluminacao[0]['statusConservacao'] == 0 ? 'selected' : ''?>>BOM</option>
							<option class="form-control" value="RAZOÁVEL"
								<?php echo $pontoIluminacao[0]['statusConservacao'] == 1 ? 'selected' : ''?>>RAZOÁVEL</option>
							<option class="form-control" value="RUIM"
								<?php echo $pontoIluminacao[0]['statusConservacao'] == 2 ? 'selected' : ''?>>RUIM</option>
						</select>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">

					<label class="col-sm-2 text-right">Tamanho</label>
					<div class="col-sm-2" >
						<input type="text" name="tamanho" value="<?php echo $pontoIluminacao[0]['tamanhoDoPoste'] ?>" class="form-control" >
					</div>
					<label class="col-sm-2 text-right">Numero</label>
					<div class="col-sm-2">
						<input type="text" name="numero" value="<?php echo $placa ?>" class="form-control" readOnly>
					</div>
					<label class="col-sm-2 text-right">Tipo do poste</label>
					<div class="col-sm-2">
						<select name="t-poste" class="form-control "/>
							<option class="form-control" value="CIRCULAR"
								<?php echo $pontoIluminacao[0]['tipoPoste'] == 'CIRCULAR' ? 'selected' : ''?>>CIRCULAR</option>
							<option class="form-control" value="POSTE DT" 
								<?php echo $pontoIluminacao[0]['tipoPoste'] == 'POSTE DT' ? 'selected' : ''?>>POSTE DT</option>
						</select>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					
					<label class="col-sm-2 text-right">Relé</label>
					<div class="col-sm-2">
						<input type="text" name="rele" value="<?php echo $pontoIluminacao[0]['rele'] ?>" class="form-control" >
					</div>
					<label class="col-sm-2 text-right">Tipo da lâmpada</label>
					<div class="col-sm-2" >
						<select name="t-lampada" class="form-control "/>
							<option class="form-control" value="VAPOR DE SODIO"
								<?php echo $pontoIluminacao[0]['tipoLampada'] == 'VAPOR DE SÓDIO' ? 'selected' : ''?>>VAPOR DE SÓDIO</option>
							<option class="form-control" value="VAPOR METALICO"
								<?php echo $pontoIluminacao[0]['tipoLampada'] == 'VAPOR DE METÁLICO' ? 'selected' : ''?>>VAPOR DE METÁLICO</option>
							<option class="form-control" value="VAPOR DE MERCURIO"
								<?php echo $pontoIluminacao[0]['tipoLampada'] == 'VAPOR DE MERCURIO' ? 'selected' : ''?>>VAPOR DE MERCURIO</option>
							<option class="form-control" value="LED"
								<?php echo $pontoIluminacao[0]['tipoLampada'] == 'LED' ? 'selected' : ''?>>LED</option>
							<option class="form-control" value="MISTO"
								<?php echo $pontoIluminacao[0]['tipoLampada'] == 'MISTO' ? 'selected' : ''?>>MISTO</option>
						</select>
					</div>

					<label class="col-sm-2 text-right">Potência da lâmpada (W)</label>
					<div class="col-sm-2">
						<select name="p-lampada" class="form-control"/>
							<option class="form-control" value="70"
								<?php echo $pontoIluminacao[0]['potenciaLampada'] == '70' ? 'selected' : ''?>>75</option>
							<option class="form-control" value="150"
								<?php echo $pontoIluminacao[0]['potenciaLampada'] == '150' ? 'selected' : ''?>>150</option>
							<option class="form-control" value="250"
								<?php echo $pontoIluminacao[0]['potenciaLampada'] == '250' ? 'selected' : ''?>>250</option>
							<option class="form-control" value="400"
								<?php echo $pontoIluminacao[0]['potenciaLampada'] == '400' ? 'selected' : ''?>>400</option>
						</select>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Tipo da luminária</label>
					<div class="col-sm-2" >
						<select name="t-luminaria" class="form-control "/>
							<option class="form-control" value="BOCAL E-27"
								<?php echo $pontoIluminacao[0]['tipoLuminaria'] == 'BOCAL E-27' ? 'selected' : ''?>>BOCAL E-27</option>
							<option class="form-control" value="BOCAL E-40"
								<?php echo $pontoIluminacao[0]['tipoLuminaria'] == 'BOCAL E-40' ? 'selected' : ''?>>BOCAL E-40</option>
						</select>
					</div>
					<label class="col-sm-2 text-right">Modelo da luminária</label>
					<div class="col-sm-2">
						<select name="m-luminaria" class="form-control "/>
							<option class="form-control" value="ABERTA"
								<?php echo $pontoIluminacao[0]['modeloLuminaria'] == 'ABERTA' ? 'selected' : ''?>>ABERTA</option>
							<option class="form-control" value="FECHADA"
								<?php echo $pontoIluminacao[0]['modeloLuminaria'] == 'FECHADA' ? 'selected' : ''?>>FECHADA</option>
							<option class="form-control" value="PETALA"
								<?php echo $pontoIluminacao[0]['modeloLuminaria'] == 'PETALA' ? 'selected' : ''?>>PETALA</option>
						</select>
					</div>
					<label class="col-sm-2 text-right">Tamanho do braço (m)</label>
					<div class="col-sm-2">
						<select name="tam-braco" class="form-control "/>
							<option class="form-control" value="1,0"
								<?php echo $pontoIluminacao[0]['modeloBraco'] == '1,0' ? 'selected' : ''?>>1,0</option>
							<option class="form-control" value="2,5"
								<?php echo $pontoIluminacao[0]['modeloBraco'] == '2,5' ? 'selected' : ''?>>2,5</option>
							<option class="form-control" value="3,0"
								<?php echo $pontoIluminacao[0]['modeloBraco'] == '3,0' ? 'selected' : ''?>>3,0</option>
							<option class="form-control" value="5,0"
								<?php echo $pontoIluminacao[0]['modeloBraco'] == '5,0' ? 'selected' : ''?>>5,0</option>
						</select>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Tipo do reator</label>
					<div class="col-sm-2" >
						<select name="t-reator" class="form-control "/>
							<option class="form-control" value="VAPOR DE SODIO"
								<?php echo $pontoIluminacao[0]['tipoReator'] == 'VAPOR DE SÓDIO' ? 'selected' : ''?>>VAPOR DE SÓDIO</option>
							<option class="form-control" value="VAPOR METALICO"
								<?php echo $pontoIluminacao[0]['tipoReator'] == 'VAPOR DE METÁLICO' ? 'selected' : ''?>>VAPOR DE METÁLICO</option>
							<option class="form-control" value="MISTO"
								<?php echo $pontoIluminacao[0]['tipoReator'] == 'MISTO' ? 'selected' : ''?>>MISTO</option>
						</select>
					</div>
					<label class="col-sm-2 text-right">Modelo do reator</label>
					<div class="col-sm-2">
						<select name="m-reator" class="form-control "/>
							<option class="form-control" value="INTERNO"
								<?php echo $pontoIluminacao[0]['modeloReator'] == 'INTERNO' ? 'selected' : ''?>>INTERNO</option>
							<option class="form-control" value="EXTERNO"
								<?php echo $pontoIluminacao[0]['modeloReator'] == 'EXTERNO' ? 'selected' : ''?>>EXTERNO</option>
						</select>
					</div>
					<label class="col-sm-2 text-right">Potencia do reator</label>
					<div class="col-sm-2">
						<select name="p-reator" class="form-control "/>
							<option class="form-control" value="70"
								<?php echo $pontoIluminacao[0]['potenciaDoReator'] == '70' ? 'selected' : ''?>>MISTO</option>
							<option class="form-control" value="150"
								<?php echo $pontoIluminacao[0]['potenciaDoReator'] == '150' ? 'selected' : ''?>>150</option>
							<option class="form-control" value="250"
								<?php echo $pontoIluminacao[0]['potenciaDoReator'] == '250' ? 'selected' : ''?>>250</option>
							<option class="form-control" value="400"
								<?php echo $pontoIluminacao[0]['potenciaDoReator'] == '400' ? 'selected' : ''?>>400</option>
						</select>
					</div>
				</div><br/>
				<div class="row" style="padding-right: 30px">
					<label class="col-sm-2 text-right">Observação sobre o ponto de iluminação</label>
					<div class="col-sm-10" style="float: right">
						<textarea name="obs-ponto" class="form-control" rows="5"><?php echo $pontoIluminacao[0]['observacoes'] ?></textarea>
					</div>
				</div>
			
				<!-- Detalhes do Endereço -->
				<!--<br><br><br>
				<legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-pencil">
					</span>&nbsp;&nbsp;&nbsp;Editar endereço</legend>
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
						<textarea id="obs-end-prev" class="form-control" rows="5" disabled><?php echo $pontoIluminacao[0]['observacao']?></textarea>
					</div>
				</div>
				-->
				<div class="row" style="margin-top: 50px; padding: 0px 100px 0px 100px;">
					<input type="submit" name="<?php echo PontoIluminacaoController::BTN_BACK?>" class="btn btn-lg btn-primary" style="float: left" value="Cancelar">
					<input type="submit" name="<?php echo PontoIluminacaoController::BTN_EDIT?>" class="btn btn-lg btn-primary" style="float: right" value="Salvar">
				</div>
			</form>
		</div>
<?php 
	}
?>
	</div>