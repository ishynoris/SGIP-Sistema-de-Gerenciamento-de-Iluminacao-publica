<?php 
	include 'header.php';
    include 'menu.php';
    include './controller/NovaOcorrenciaController.class.php';
    include './controller/HomeController.class.php'
?>



<?php
    if ($_SESSION['isAdmin'] == Usuario::USUARIO) {
?>

    <div class="row" style="padding-left:0;">
        <form class="bk clear" style="padding: 30px; margin:50px"  method="post">
            <legend style="padding-bottom:10px; margin-bottom: 50px">Pesquisar ocorrência&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-search"></span></legend>
            <div class="form-group">
                <div class="row">
                    <label class="col-sm-2 text-right">Protocolo</label>
                    <div class="col-sm-8">
                        <input type="text" name="protocolo" class="form-control" value="201659715" placeholder="Digite aqui o número do protocolo">
                    </div>
                    <div class="col-sm-2">
                        <button type="submit" name="<?php echo NovaOcorrenciaController::BTN_SEARCH?>" class="btn btn-primary">Pesquisar</button>
                    </div>
                </div>
            </div>
        </form>


<?php   $controller = new NovaOcorrenciaController();
        $buscarOcorrencia = $controller->triggerInput($controller->getInputAction());

        if(!is_null($buscarOcorrencia)) {

            if(empty($buscarOcorrencia)) {
?>
                <form class="bk clear" style="margin: 50px; padding: 30px">
                    <legend style="padding-bottom:10px; margin-bottom: 50px">Nenhuma ocorrencia encontrada&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-remove"></span></legend>
                </form>

<?php       } else {
                foreach ($buscarOcorrencia as $key) {
?>
                <form class="bk clear" style="margin: 50px; padding: 30px">
                    <legend style="padding-bottom:10px; margin-bottom: 50px">Ocorrencia encontrada&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></legend>

                    <!-- Detalhes do munícipe -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $key['usuario']; ?>" disabled>
                        </div>
                    </div><br/>

                    <!-- Descriçao da ocorrência -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Protocolo</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['protocolo']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Manutenção</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $key['manutencao']; ?>" disabled>
                        </div>
                    </div><br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Status</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['status']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Data de registro</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['data_inicio']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Prazo final</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['prazo']; ?>" disabled>
                        </div>
                    </div><br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Descrição do problema</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" disabled><?php echo $key['descricao']?></textarea>
                        </div>
                    </div><br/>

                    <!-- Descriçao da endereço -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['cep']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Logradouro</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $key['logradouro']; ?>" disabled>
                        </div>
                    </div><br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Numero</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['numPredialProx']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Complemento</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $key['complemento']; ?>" disabled>
                        </div>
                    </div><br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Bairro</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $key['bairro']; ?>" disabled>
                        </div>
                        <label class="col-sm-1 text-right">Cidade</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $key['cidade']; ?>" disabled>
                        </div>
                        <label class="col-sm-1 text-right">UF</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" value="<?php echo $key['uf']; ?>" disabled>
                        </div>
                    </div><br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" disabled><?php echo $key['observacao']?></textarea>
                        </div>
                    </div><br/>
                </form>
    </div>
<?php
                }
            }
        }
    } else {
?>

    <div class="row" style="padding: 50px;">
        <div class="col-sm-6" >
            <div class="table-responsive box-relatorio">
                <table class="bk" width="100%" id="tabela">
                    <legend class="legend">Ultimos Pontos Cadastrados</legend>

<?php               $buscaProdutos = HomeController::getLastLightPoints();
                    $i = 1;
                    foreach ((array) $buscaProdutos as $result) {
?>
                    <tr>
                        <td class="tdPers">#<?php echo $i++; ?></td>
                        <td class="tdPers"><?php echo $result['logradouro']; ?></td>
                    </tr>
<?php               }
?>
                </table>
            </div>
        </div>

        <div class="col-sm-6" >
            <div class="table-responsive box-relatorio">
                <table class="bk" width="100%">
                    <legend class="legend">Ultimos Usuarios Cadastrados</legend>

<?php               $buscarUsuario = HomeController::getLastUserName();
                    $i = 1;
                    foreach ($buscarUsuario as $result) {
?>
                        <tr>
                            <td class="tdPers">#<?php echo $i++; ?></td>
                            <td class="tdPers"><?php echo $result['usuario']; ?></td>
                        </tr>
<?php               }
?>
                </table>
            </div>
        </div>
    </div>
    <div class="row" style="padding: 0px 50px 50px 50px ;">

        <div class="bk col-sm-6">
            <legend class="legend" style="padding: 20px">Grafico das Componentes</legend>
            <img src="grafico-funcionalidades.php" style="width: 100%;">
        </div>
        <div class="bk col-sm-6" >
            <legend class="legend" style="padding: 20px">Grafico das Componentes</legend>
            <img src="grafico-componentes.php" style="width: 100%;">
        </div>
    </div>
    <div class="row" style="padding: 0px 50px 50px 50px ;">
        <div class="bk col-sm-6" >
            <legend class="legend" style="padding: 20px">Grafico das Ocorrências</legend>
            <img src="grafico-ocorrencias.php" style="width: 100%;">
        </div>
        <div class="bk col-sm-6" >
            <legend class="legend" style="padding: 20px">Grafico das Manutenções</legend>
            <img src="grafico-manutencao.php" style="width: 100%;">
        </div>
    </div>
<?php
    }
?>