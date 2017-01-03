<?php
	include './header.php';
    include './menu-top.php';
	include './controller/OcorrenciaController.class.php';

    if(!isset($_SESSION)){
        header("Location: home.php");
    }
	$protocol = 2016 . rand(11111,99999);

    $controller = new OcorrenciaController();
    $controller->triggerInput($controller->getInputAction());

?>
<html>
	<head>
		<!--
		<noscript>  
			<meta http-equiv="Refresh" content="2; url=http://www.google.com.br">
		</noscript>
		-->
        <link rel="stylesheet" type="text/css" href="css/chosen.min.css">
        <style>
            .line{
                padding: 30px;
                margin: 70px 20px 0px 50px;
            }
        </style>

        <script type="text/javascript" src="js/script.validar.mascaras.js"></script>
        <script type="text/javascript" src="js/script.nova.ocorrencia.js"></script>

		<script type="text/javascript">

            $(document).ready(function($){
                $("#cep-prev").mask("99.999-999");
            });
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
                        <legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-plus"></span>
                            &nbsp;&nbsp;&nbsp;Cadastrar nova ocorrência</legend>
                        <div class="row" style="margin-bottom: 50px">
                            <div style="padding-left: 30px;">
                                <ul class="nav nav-pills" id="menu-list">
                                    <li role="presentation" id="li-0"><a href="">Apresentação</a></li>
                                    <li role="presentation" id="li-1"><a href="">Dados gerais</a></li>
                                    <li role="presentation" id="li-2"><a href="">Descrição</a></li>
                                    <li role="presentation" id="li-3"><a href="">Localização</a></li>
                                    <li role="presentation" id="li-4"><a href="">Concluir</a></li>
                                </ul>
                            </div>
                            <div class="progress" style="margin: 40px; margin-bottom: 20px">
                                <div id="progress-bar" class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                </div>
                            </div>
                        </div>

                        <!-- PASSO UM ----------------------------------------------------------------- -->
                        <div id="step-0" class="hide" style="margin: 0px 30px 30px 30px;">
                            <div class="well well-lg">
                                <h4>
                                Este serviço tem como objetivo proporcionar ao cidadão de Ipatinga o encaminhamento de sua solicitação de reparos na iluminação pública (lâmpada apagada/quebrada e acesa durante o dia) de um determinado ponto de atendimento.
                                <br/><br/>
                                Se necessário você pode entrar em contato pelo telefone (79) 3214-6742 ou pelo e-mail sac@viaretaluz.com.br.
                                <br/>
                                </h4>
                            </div>
                        </div>
                        <!-- PASSO DOIS --------------------------------------------------------------- -->
                        <div id="step-1" class="hide">
                            <div class="form-group.required">

                                <div class="row"  style="padding-right: 30px">
                                    <label class="col-sm-2 text-right">Protocolo</label>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" value="<?php echo  $protocol ?>" disabled=true>
                                    </div>
<?php
                                if($_SESSION['isAdmin'] == Usuario::ATENDENTE){
?>
                                    <label class="col-sm-2 text-right">Prioridade</label>
                                    <div class="col-sm-4">
                                        <select id="prioridade-prev" >
                                            <option class="form-control" value="<?php echo Ocorrencia::PRIO_ALTA?>">
                                                <?php echo Ocorrencia::PRIO_ALTA?></option>
                                            <option class="form-control" value="<?php echo Ocorrencia::PRIO_MEDIA?>" selected>
                                                <?php echo Ocorrencia::PRIO_MEDIA?></option>
                                            <option class="form-control" value="<?php echo Ocorrencia::PRIO_BAIXA?>">
                                                <?php echo Ocorrencia::PRIO_BAIXA?></option>
                                        </select>
                                    </div>
<?php                           } else {
?>
                                    <label class="col-sm-2 text-right hide">Prioridade</label>
                                    <div class="col-sm-4" >
                                        <input type="text" id="prioridade-prev" value="<?php echo Ocorrencia::PRIO_BAIXA?>" class="form-control hide" >
                                    </div>
<?php                           }
?>
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
                        <!-- PASSO Tres --------------------------------------------------------------- -->
                        <div id="step-2" class="hide">
                            <div class="form-group">
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
                        <!-- PASSO QUATRO ------------------------------------------------------------- -->
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
                        <!-- PASSO CINCO ---------------------------------------------------------------->
                        <div id="step-4" class="hide" >
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
                                <div class="col-sm-4">
                                    <input type="text" id="protocolo" name="protocolo" class="form-control" value="<?php echo $protocol?>" disabled>
                                </div>
<?php
                            if($_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                                <label class="col-sm-2 text-right">Prioridade</label>
                                <div class="col-sm-4">
                                    <input type="text" id="prioridade" name="prioridade" class="form-control" disabled>
                                </div>
<?php
                            } else {
?>
                                <label class="col-sm-2 text-right hide">Prioridade</label>
                                <div class="col-sm-4">
                                    <input type="text" id="prioridade" name="prioridade" class="form-control hide" disabled>
                                </div>
<?php
                            }
?>
                            </div><br/>
                            <div class="row"  style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Manutenção</label>
                                <div class="col-sm-10">
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
                        <!-- MENU DE NAVEGAÇÃO--------------------------------------------------------- -->
                        <div class="row" style="margin-top: 50px; padding: 0px 100px 0px 100px;">
                            <!-- <button href="javascript:back()" id="btn-back" class="btn btn-lg" style="float: left"> &laquo; Voltar</button> -->
                            <a href="javascript:back()" id="btn-back" class="btn btn-lg" style="float: left"> &laquo; Voltar</a>
                            <input type="submit" id="btn-save" name="<?php echo OcorrenciaController::BTN_SAVE?>" value="Registrar ocorrência" class="btn btn-lg btn-primary hide" style="float: right">
                            <a href="javascript:next()" id="btn-next" class="btn btn-lg" style="float: right">Avançar &raquo;</a>
                        </div>
                    </div>
				</form>
			</div>
		</div>
        </div>
	</body>
</html>