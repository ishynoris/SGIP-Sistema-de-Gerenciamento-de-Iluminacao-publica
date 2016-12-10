<?php
include 'header.php';
include 'menu.php';
include_once './controller/NovaOcorrenciaController.class.php';

$protocol = '';
if(isset($_GET['pid'])) {
    $protocol = $_GET['pid'];
}

?>
<style>
    .line{
        padding: 30px;
        margin: 50px 50px 0px 50px;
    }
</style>

<script>
    function clearGet() {
        $protocol = "";
        window.history.pushState('Object', 'Categoria JavaScript', 'pesquisar-ocorrencia.php');
    }
</script>


<div class="row">
    <form class="bk clear line" method="post">
        <legend style="padding-bottom:10px; margin-bottom: 50px">Pesquisar ocorrência&nbsp;&nbsp;&nbsp;<span
                    class="glyphicon glyphicon-search"></span></legend>
        <div class="form-group">
            <div class="row">
                <label class="col-sm-2 text-right">Protocolo</label>
                <div class="col-sm-3">
                    <input type="text" id="protocol" name="<?php echo NovaOcorrenciaController::PROTOCOL ?>" class="form-control"
                           placeholder="Digite aqui o número do protocolo" value="<?php echo $protocol?>">
                </div>
                <div class="col-sm-1">
                    <button type="submit" onclick="clearGet()" name="<?php echo NovaOcorrenciaController::BTN_SEARCH ?>"
                            class="btn btn-primary">Pesquisar
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="row" style="padding-left:0;">
    <?php $controller = new NovaOcorrenciaController();
    $buscarOcorrencia = $controller->triggerInput($controller->getInputAction());

    if(!empty($protocol)){
        $buscarOcorrencia = $controller->getByProtocol($protocol);
        $protocol = "";
    }


    if (!is_null($buscarOcorrencia)) {
        if (empty($buscarOcorrencia)) {
            ?>
            <div class="bk clear line">
                <legend style="padding-bottom:10px; margin-bottom: 50px">Nenhuma ocorrencia encontrada&nbsp;&nbsp;&nbsp;<span
                            class="glyphicon glyphicon-remove"></span></legend>
            </div>

        <?php } else {
            foreach ($buscarOcorrencia as $key) {
                ?>

                <div class="bk clear line">
                    <legend style="padding-bottom:10px; margin-bottom: 50px">Ocorrencia
                        encontrada&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-ok"></span></legend>

                    <!-- Detalhes do munícipe -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $key['usuario']; ?>" disabled>
                        </div>
                    </div>
                    <br/>

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
                    </div>
                    <br/>
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
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Descrição do problema</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" disabled><?php echo $key['descricao'] ?></textarea>
                        </div>
                    </div>
                    <br/>

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
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Numero</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $key['numPredialProx']; ?>"
                                   disabled>
                        </div>
                        <label class="col-sm-2 text-right">Complemento</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $key['complemento']; ?>" disabled>
                        </div>
                    </div>
                    <br/>
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
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4" disabled><?php echo $key['observacao'] ?></textarea>
                        </div>
                    </div>
                    <br/>
                </div>
            <?php }
        }
    }
    ?>
</div>