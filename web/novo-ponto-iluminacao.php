<?php 
	include 'header.php';
	include 'menu-top.php';
    include 'controller/PontoIluminacaoController.class.php';

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
    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
    </style>

    <script type="text/javascript" src="js/script.novo.ponto.iluminacao.js"></script>
    
    <div class="row">

<?php
        include 'menu-left.php';
?>
        <div class="col-sm-10" >
            <div class="bk line">
                <form id="form" method="post">
                    <div class="form-group" >
                        <legend style="padding-bottom:10px;"><span class="glyphicon glyphicon-plus"></span>
                            &nbsp;&nbsp;&nbsp;Cadastrar ponto de iluminação</legend>

                        <div class="row" style="margin-bottom: 50px">
                            <div style="padding-left: 30px;">
                                <ul class="nav nav-pills" id="menu-list">
                                    <span id="spn-0" class="btn">Caracteristicas do poste</span>
                                    <span id="spn-1" class="btn">Localização</span>
                                    <span id="spn-2" class="btn">Concluir</span>
                                </ul>
                            </div>
                            
                            <div class="progress" style="margin: 40px; margin-bottom: 20px">
                                <div id="progress-bar" class="progress-bar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">
                                </div>
                            </div>
                        </div>
                        <!-- PASSO UM - DADOS GERAIS ------------------------------------------------------------ -->
                        <div id="step-0">
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tamanho</label>
                                <div class="col-sm-2" >
                                    <input type="text" id="tamanho-prev" value="49503429" class="form-control" >
                                </div>
                                <label class="col-sm-2 text-right">Relé</label>
                                <div class="col-sm-2">
                                    <input type="text" id="rele-prev" value="49503429" class="form-control" >
                                </div>
                                <label class="col-sm-2 text-right">Tipo do poste</label>
                                <div class="col-sm-2">
                                    <select id="t-poste-prev" class="form-control "/>
                                        <option class="form-control" value="CIRCULAR" >CIRCULAR</option>
                                        <option class="form-control" value="POSTE DT">POSTE DT</option>
                                    </select>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tipo do reator</label>
                                <div class="col-sm-2" >
                                    <select id="t-reator-prev" class="form-control "/>
                                        <option class="form-control" value="VAPOR DE SODIO">VAPOR DE SÓDIO</option>
                                        <option class="form-control" value="VAPOR METALICO">VAPOR DE METÁLICO</option>
                                        <option class="form-control" value="MISTO">MISTO</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 text-right">Modelo do reator</label>
                                <div class="col-sm-2">
                                    <select id="m-reator-prev" class="form-control "/>
                                        <option class="form-control" value="INTERNO">INTERNO</option>
                                        <option class="form-control" value="EXTERNO">EXTERNO</option>
                                    </select>
                                </div>

                                <label class="col-sm-2 text-right">Potencia do reator</label>
                                <div class="col-sm-2">
                                    <select id="p-reator-prev" class="form-control "/>
                                        <option class="form-control" value="70">70</option>
                                        <option class="form-control" value="150">150</option>
                                        <option class="form-control" value="250">250</option>
                                        <option class="form-control" value="400">400</option>
                                    </select>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tipo da luminária</label>
                                <div class="col-sm-2" >
                                    <select id="t-luminaria-prev" class="form-control "/>
                                        <option class="form-control" value="BOCAL E-27">BOCAL E-27</option>
                                        <option class="form-control" value="BOCAL E-40">BOCAL E-40</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 text-right">Modelo da luminária</label>
                                <div class="col-sm-2">
                                    <select id="m-luminaria-prev" class="form-control "/>
                                        <option class="form-control" value="ABERTA">ABERTA</option>
                                        <option class="form-control" value="FECHADA">FECHADA</option>
                                        <option class="form-control" value="PETALA">PÉTALA</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 text-right">Tamanho do braço (m)</label>
                                <div class="col-sm-2">
                                    <select id="tam-braco-prev" class="form-control "/>
                                        <option class="form-control" value="ABERTA">1,0</option>
                                        <option class="form-control" value="FECHADA">2,5</option>
                                        <option class="form-control" value="PETALA">3,0</option>
                                        <option class="form-control" value="PETALA">5,0</option>
                                    </select>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tipo da lâmpada</label>
                                <div class="col-sm-3" >
                                    <select id="t-lampada-prev" class="form-control "/>
                                        <option class="form-control" value="VAPOR DE SODIO">VAPOR DE SÓDIO</option>
                                        <option class="form-control" value="VAPOR METALICO">VAPOR DE METÁLICO</option>
                                        <option class="form-control" value="VAPOR DE MERCURIO">VAPOR DE MERCURIO</option>
                                        <option class="form-control" value="LED">LED</option>
                                        <option class="form-control" value="MISTO">MISTO</option>
                                    </select>
                                </div>

                                <label class="col-sm-4 text-right">Potência da lâmpada (W)</label>
                                <div class="col-sm-3">
                                    <select id="p-lampada-prev" class="form-control"/>
                                        <option class="form-control" value="70">75</option>
                                        <option class="form-control" value="150">150</option>
                                        <option class="form-control" value="250">250</option>
                                        <option class="form-control" value="400">400</option>
                                    </select>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Observação sobre o ponto de iluminação</label>
                                <div class="col-sm-10" style="float: right">
                                    <textarea id="obs-ponto-prev" class="form-control" rows="5">Observacao sobre novo ponto de iluminação</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- PASSO DOIS - LOCALIZAÇÃO ----------------------------------------------------------- -->
                        <div id="step-1">
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">CEP</label>
                                <div class="col-sm-3" >
                                    <input type="text" onblur="searchCEP(this.value)" id="cep-prev" class="form-control" >
                                </div>
                                <div class="col-sm-1">
                                    <a target='_blank' href="http://www.buscacep.correios.com.br/sistemas/buscacep/buscaCep.cfm" class="btn btn-primary btn-xs">Consultar CEP</span></a>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Logradouro</label>
                                <div class="col-sm-7">
                                    <input type="text" id="logradouro-prev" class="form-control" disabled>
                                </div>
                                <label class="col-sm-1 text-right">Numero</label>
                                <div class="col-sm-2">
                                    <input id="numPredialProx-prev" type="text" class="form-control">
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Complemento</label>
                                <div class="col-sm-5">
                                    <input type="text" id="complemento-prev" class="form-control">
                                </div>
                                <label class="col-sm-1 text-right" >Bairro</label>
                                <div class="col-sm-4">
                                    <input type="text" id="bairro-prev" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Cidade</label>
                                <div class="col-sm-7">
                                    <input type="text" id="cidade-prev" class="form-control" disabled>
                                </div>
                                <label class="col-sm-1 text-right">UF</label>
                                <div class="col-sm-2">
                                    <input type="text" id="uf-prev" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                                <div class="col-sm-10" style="float: right">
                                    <textarea id="obs-end-prev" class="form-control" rows="5">Observacao sobre o endereço da ocorrencia</textarea>
                                </div>
                            </div>
                        </div>
                        <!-- PASSO DOIS - CONFIRMAÇÃO ----------------------------------------------------------- -->
                        <div id="step-2">
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Tamanho</label>
                                <div class="col-sm-2" >
                                    <input type="text" name="tamanho" id="tamanho" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Relé</label>
                                <div class="col-sm-2">
                                    <input type="text" name="rele" id="rele" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Tipo do poste</label>
                                <div class="col-sm-2">
                                    <input type="text" name="t-poste" id="t-poste" class="form-control" disabled>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Tipo do reator</label>
                                <div class="col-sm-2" >
                                    <input type="text" name="t-reator" id="t-reator" class="form-control" disabled>
                                </div>

                                <label class="col-sm-2 text-right">Modelo do reator</label>
                                <div class="col-sm-2">
                                    <input type="text" name="m-reator" id="m-reator" class="form-control" disabled>
                                </div>

                                <label class="col-sm-2 text-right">Potencia do reator</label>
                                <div class="col-sm-2">
                                    <input type="text" name="p-reator" id="p-reator" class="form-control" disabled>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tipo da luminária</label>
                                <div class="col-sm-2" >
                                    <input type="text" name="t-luminaria" id="t-luminaria" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Modelo da luminária</label>
                                <div class="col-sm-2">
                                    <input type="text" name="m-luminaria" id="m-luminaria" class="form-control" disabled>
                                </div>
                                <label class="col-sm-2 text-right">Tamanho do braço (m)</label>
                                <div class="col-sm-2">
                                    <input type="text" name="tam-braco" id="tam-braco" class="form-control" disabled>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Tipo da lâmpada</label>
                                <div class="col-sm-3" >
                                    <input type="text" name="t-lampada" id="t-lampada" class="form-control" disabled>
                                </div>

                                <label class="col-sm-4 text-right">Potência da lâmpada (W)</label>
                                <div class="col-sm-3">
                                    <input type="text" name="p-lampada" id="p-lampada" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Observação sobre o ponto de iluminação</label>
                                <div class="col-sm-10" style="float: right">
                                    <textarea name="obs-ponto" id="obs-ponto" class="form-control" rows="5" disabled></textarea>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">CEP</label>
                                <div class="col-sm-3" >
                                    <input type="text" name="cep" id="cep" class="form-control" disabled>
                                </div>
                            </div><br/>
                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Logradouro</label>
                                <div class="col-sm-7">
                                    <input type="text" name="logradouro" id="logradouro" class="form-control" disabled>
                                </div>
                                <label class="col-sm-1 text-right">Numero</label>
                                <div class="col-sm-2">
                                    <input name="numPredialProx" id="numPredialProx" type="text" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Complemento</label>
                                <div class="col-sm-5">
                                    <input type="text" name="complemento" id="complemento" class="form-control" disabled>
                                </div>
                                <label class="col-sm-1 text-right" >Bairro</label>
                                <div class="col-sm-4">
                                    <input type="text" name="bairro" id="bairro" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">
                                <label class="col-sm-2 text-right">Cidade</label>
                                <div class="col-sm-7">
                                    <input type="text" name="cidade" id="cidade" class="form-control" disabled>
                                </div>
                                <label class="col-sm-1 text-right">UF</label>
                                <div class="col-sm-2">
                                    <input type="text" name="uf" id="uf" class="form-control" disabled>
                                </div>
                            </div><br/>

                            <div class="row" style="padding-right: 30px">

                                <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                                <div class="col-sm-10" style="float: right">
                                    <textarea name="obs-end" id="obs-end" class="form-control" rows="5" disabled></textarea>
                                </div>
                            </div>
                        </div>  
                        <!-- MENU DE NAVEGAÇÃO--------------------------------------------------------- -->
                        <div class="row" style="margin-top: 50px; padding: 0px 100px 0px 100px;">
    
                            <a onclick="back()" id="btn-back" class="btn btn-lg" style="float: left">&laquo; Voltar</a>
                            <a onclick="next()" id="btn-next" class="btn btn-lg" style="float: right">Avançar &raquo;</a>
                            <input type="submit" id="btn-save" name="<?php echo PontoIluminacaoController::BTN_SAVE?>" class="btn btn-lg btn-primary" style="float: right" value="Registrar ponto">
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>

<?php
	include 'footer.php';
?>