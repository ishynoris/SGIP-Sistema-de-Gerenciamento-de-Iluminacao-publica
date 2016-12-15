<?php
	include './header.php';
    include './menu-top.php';
	include './controller/NovaOcorrenciaController.class.php';

    if(!isset($_SESSION)){
        header("Location: home.php");
    }
	$protocol = 2016 . rand(11111,99999);

    $controller = new NovaOcorrenciaController();
    $controller->triggerInput($controller->getInputAction());

?>
<html>
	<head>
		<!--
		<noscript>  
			<meta http-equiv="Refresh" content="2; url=http://www.google.com.br">
		</noscript>
		-->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/chosen.min.css">
        <style>
            .line{
                padding: 30px;
                margin: 70px 20px 0px 50px;
            }
        </style>

        <script src="http://digitalbush.com/wp-content/uploads/2014/10/jquery.maskedinput.js"></script>
        <script type="text/javascript" src="js/script.validar.mascaras.js"></script>
        <script type="text/javascript" src="js/script.nova.ocorrencia.js"></script>
        <script type="text/javascript" src="js/chosen.jquery.min.js"></script>

		<script type="text/javascript">

            $("document").ready(function() {
                $('#cep-prev').mask('99.999-999');
            });
			function addOcorrencia(){
				alert("addOcorrencia");
			};
		</script>
	</head>
	<body onLoad="start()">
        <div class="row">
<?php
            include 'menu-left.php';
?>
		    <div class="col-sm-10" >
			<div class="bk line">
				<form id="form" method="post">
                    <div class="form-group" >
                        <legend style="padding-bottom:10px; margin-bottom: 50px"><span class="glyphicon glyphicon-plus"></span>
                            &nbsp;&nbsp;&nbsp;Cadastrar nova ocorrência</legend>
                        <div class="row" style="margin-bottom: 50px">
                            <div style="padding-left: 30px;">
                                <ul class="nav nav-pills" id="menu-list">
                                    <li role="presentation" id="li-0" ><a href="">Apresentação</a></li>
                                    <li role="presentation" id="li-1" ><a href="">Dados gerais</a></li>
                                    <li role="presentation" id="li-2" ><a href="">Descrição</a></li>
                                    <li role="presentation" id="li-3" ><a href="">Localização</a></li>
                                    <li role="presentation" id="li-4" ><a href="">Concluir</a></li>
                                </ul>
                            </div>
                            <div class="progress" style="margin: 40px; margin-bottom: 20px">
                                <div id="progress-bar" class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                </div>
                            </div>
                        </div>

                        <!-- PASSO UM ------------------------------------------------------------------->
                        <div id="step-0" class="hide" style="margin: 0px 30px 30px 30px;">
                            <div class="well well-lg">
                                <h4>
                                Este serviço tem como objetivo proporcionar ao cidadão de Ipatinga o encaminhamento de sua solicitação de reparos na iluminação pública (lâmpada apagada/quebrada e acesa durante o dia) de um determinado ponto de atendimento.
                                <br/><br/>
                                Se necessário você pode entrar em contato pelo telefone (79) 3214-6742 ou pelo e-mail comercial@unicoalimentos.com.br.
                                <br/>
                                </h4>
                            </div>
                        </div>
                        <!-- PASSO DOIS ------------------------------------------------------------------->
                        <div id="step-1" class="hide">
                            <div class="form-group.required">

                                <div class="row"  style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Protocolo</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo  $protocol ?>" disabled=true>
                                    </div>
                                </div><br/>
                                <div class="row"  style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Nome</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="<?php echo $_SESSION['usuario'] ?>" disabled=true>
                                    </div>
                                </div><br/>
                                <div class="row" style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Manutenção</label>
                                    <div class="col-sm-10">

                                        <select id="manutencao-prev" >
                                            <option class="form-control" value="LÂMPADA PISCANTE">LÂMPADA PISCANTE</option>
                                            <option class="form-control" value="LÂMPADA ACESA">LÂMPADA ACESA</option>
                                            <option class="form-control" value="LÂMPADA APAGADA">LÂMPADA APAGADA</option>
                                            <option class="form-control" value="LÂMPADA QUEBRADA">LÂMPADA QUEBRADA</option>
                                            <option class="form-control" value="LÂMPADA INTERMITENTE">LÂMPADA INTERMITENTE</option>
                                            <option class="form-control" value="BRAÇO DE ILUMINAÇÃO PÚBLICA QUEBRADO">BRAÇO DE ILUMINAÇÃO PÚBLICA QUEBRADO</option>
                                            <option class="form-control" value="POSTE EXCLUSIVO IP">POSTE EXCLUSIVO IP</option>
                                            <option class="form-control" value="LUMINÁRIA QUEBRADA">LUMINÁRIA QUEBRADA</option>
                                            <option class="form-control" value="LUMINÁRIA SUJA">LUMINÁRIA SUJA</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PASSO Tres ------------------------------------------------------------------->
                        <div id="step-2" class="hide">
                            <div class="form-group">
                                <div class="row" style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Prioridade</label>
                                    <div class="col-sm-10">

                                        <select id="prioridade-prev">
                                            <option class="form-control" value="2">BAIXA</option>
                                            <option class="form-control" value="1" selected>MÉDIA</option>
                                            <option class="form-control" value="0">ALTA</option>
                                        </select>
                                    </div>
                                </div><br>
                                <div class="row" style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Descrição do problema</label>
                                    <div class="col-sm-10" style="float: right">
                                        <textarea id="descricao-prev" class="form-control" rows="5">Alguma descricao generica do problema</textarea>
                                    </div>
                                </div>
                                <br><div class="row" style="padding-right: 40px">
                                    <label class="col-sm-2 text-right">Carregar uma foto</label>
                                    <div class="col-sm-10" style="float: right">
                                        <a id="btn-picture" class="btn btn-primary btn-lg">&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-camera"></span>&nbsp;&nbsp;&nbsp; </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PASSO QUATRO ------------------------------------------------------------------->
                        <div id="step-3" class="hide">
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Área rural</label>
                                <div class="col-sm-2">
                                    <select id="rural-prev" class="form-control "/>
                                        <option class="form-control" value="SIM" >SIM</option>
                                        <option class="form-control" value="NÃO" selected>NÃO</option>
                                    </select>
                                </div>
                                <label class="col-sm-1 text-right">CEP</label>
                                <div class="col-sm-3" >
                                    <input type="text" id="cep-prev" value="49503429" class="form-control" >
                                </div>
                                <div class="col-sm-1">
                                    <a target='_blank' href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm" class="btn btn-primary btn-xs">Consultar CEP</span></a>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Logradouro</label>
                                <div class="col-sm-7">
                                    <input type="text" id="logradouro-prev" class="form-control" value="Rua Jose" disabled>
                                </div>
                                <label class="col-sm-1 text-right">Numero</label>
                                <div class="col-sm-2">
                                    <input id="numPredialProx-prev" type="text" class="form-control" value="748">
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Complemento</label>
                                <div class="col-sm-5">
                                    <input type="text" id="complemento-prev" class="form-control" value="Algum complemento">
                                </div>
                                <label class="col-sm-1 text-right" >Bairro</label>
                                <div class="col-sm-4">
                                    <input type="text" id="bairro-prev" class="form-control" value="Centro" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Cidade</label>
                                <div class="col-sm-7">
                                    <input type="text" id="cidade-prev" class="form-control" value="Itabaiana" disabled>
                                </div>
                                <label class="col-sm-1 text-right">UF</label>
                                <div class="col-sm-2">
                                    <input type="text" id="uf-prev" class="form-control" value="SE" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                                <div class="col-sm-10" style="float: right">
                                    <textarea id="observacao-prev" class="form-control" rows="5">Observacao sobre o endereço da ocorrencia</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- PASSO CINCO ------------------------------------------------------------------->
                        <div id="step-4" class="hide">
                            <div class="alert alert-info" role="alert" style="padding: 40px; margin:0px 30px 30px 30px;">
                                Por favor, verifique todos os campos antes de prosseguir.
                            </div>

                            <div class="row"  style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="<?php echo $_SESSION['usuario'] ?>" disabled>
                                </div>
                            </div><br/>

                            <div class="row"  style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Protocolo</label>
                                <div class="col-sm-2">
                                    <input type="text" id="protocolo" name="protocolo" class="form-control" value="<?php echo $protocol?>" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Manutenção</label>
                                <div class="col-sm-6">
                                    <input type="text" id="manutencao" name="manutencao" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Descrição do problema</label>
                                <div class="col-sm-10">
                                    <textarea id="descricao" name="descricao" class="form-control" rows="4" disabled></textarea>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Área rural</label>
                                <div class="col-sm-4">
                                    <input type="text" id="rural" name="rural" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">CEP</label>
                                <div class="col-sm-4">
                                    <input type="text" id="cep" name="cep" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Logradouro</label>
                                <div class="col-sm-6">
                                    <input type="text" id="logradouro" name="logradouro" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Numero</label>
                                <div class="col-sm-2">
                                    <input type="text" id="numPredialProx" name="numPredialProx" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Complemento</label>
                                <div class="col-sm-5">
                                    <input type="text" id="complemento" name="complemento" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Bairro</label>
                                <div class="col-sm-3">
                                    <input type="text" id="bairro" name="bairro" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Cidade</label>
                                <div class="col-sm-6">
                                    <input type="text" id="cidade" name="cidade" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">UF</label>
                                <div class="col-sm-2">
                                    <input type="text" id="uf" name="uf" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                                <div class="col-sm-10">
                                    <textarea id="observacao" name="observacao" class="form-control" rows="4" disabled></textarea>
                                </div>
                            </div><br/>
                        </div>
                        <!-- MENU DE NAVEGAÇÃO------------------------------------------------------------------------------->
                        <div class="row" style="margin-top: 50px; padding-left: 100px; padding-right: 100px;">
                            <a href="javascript:back()" id="btn-back" class="btn btn-sm" style="float: left"> &laquo; Voltar</a>
                            <input type="submit" id="btn-save" name="<?php echo NovaOcorrenciaController::BTN_SAVE?>" value="Registrar ocorrência" class="btn btn-sm btn-primary hide" style="float: right">
                            <a href="javascript:next()" id="btn-next" class="btn btn-sm " style="float: right">Avançar &raquo;</a>
                        </div>
                    </div>
				</form><br/><br/><br/>
<?php           if($_SESSION['isAdmin'] == Usuario::ADMIN) {
?>
				<button onclick="addOcorrencia()" class="btn btn-danger btn-lg" style="margin: 40px; float: right">Adicionar nova ocorrência</button>
				<table id="tabela" class="bk table table-striped" width="100%">
					<tr>
						<th class="col-lg-1">Protocolo</th>
						<th class="col-lg-1">Status</th>
						<th class="col-lg-1">Data</th>
						<th class="col-lg-1">Prazo</th>
						<th class="col-lg-3">Nome do munícipe</th>
						<th class="col-lg-5">Endereco da ocorrência</th>
					</tr>
					<tr>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna1" placeholder="Filtrar por protocolo"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna2" placeholder="Filtrar por status"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna3" placeholder="Filtrar por data"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna4" placeholder="Filtrar por prazo"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna5" placeholder="Filtrar por municipe"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "><input type="text"  style="border: 1px solid #fff;" class="form-control login-field" id="txtColuna6" placeholder="Filtrar por endereco"/></th>
						<th style="background: #fff;color: #000;border: 1px solid #ccc;padding: 0px !important; "></th>
					</tr>

<?php               $buscarOcorrencia = $controller->getAll();
                    $controller->getAll();

					foreach ($buscarOcorrencia as $result)
					{
					    $endereco = $result['logradouro'] . " " . $result['numPredialProx']
                            . ", " .$result['bairro'] . ". " . $result['cidade']
                            . " - " . $result['uf'];
?>
						<tr>
							<td class="tdPers"><?php echo $result['protocolo']; ?></td>
							<td class="tdPers"><?php echo $result['status']; ?></td>
							<td class="tdPers"><?php echo $result['data_inicio']; ?></td>
							<td class="tdPers"><?php echo $result['prazo']; ?></td>
							<td class="tdPers"><?php echo $result['usuario']; ?></td>
							<td class="tdPers"><?php echo $endereco; ?></td>
						</tr>
<?php               }
?>
				</table>
<?php           }
?>
			</div>
		</div>
        </div>
	</body>
</html>