<?php
include './header.php';
include './menu.php';
include_once './controller/NovaOcorrenciaController.class.php';
$oid = $_GET['oid'];
$uid = $_GET['uid'];

if(empty($oid) || empty($uid)){

    header("Location: home.php");
    exit;

} else {

    if ($uid == $_SESSION['id']) {

        $ocorrencia = NovaOcorrenciaController::getFaultDetails($oid, $uid);
        if ($ocorrencia) {
            var_dump($ocorrencia);
            ?>
            <form class="bk clear" style="margin: 50px; padding: 30px">
                <legend style="padding-bottom:10px; margin-bottom: 50px">Ocorrencia encontrada&nbsp;&nbsp;&nbsp;<span
                            class="glyphicon glyphicon-ok"></span></legend>

                <!-- Detalhes do munícipe -->
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['usuario']; ?>" disabled>
                    </div>
                </div>
                <br/>

                <!-- Descriçao da ocorrência -->
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Protocolo</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['protocolo']; ?>"
                               disabled>
                    </div>
                    <label class="col-sm-2 text-right">Manutenção</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['manutencao']; ?>"
                               disabled>
                    </div>
                </div>
                <br/>
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Status</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['status']; ?>" disabled>
                    </div>
                    <label class="col-sm-2 text-right">Data de registro</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['data_inicio']; ?>"
                               disabled>
                    </div>
                    <label class="col-sm-2 text-right">Prazo final</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['prazo']; ?>" disabled>
                    </div>
                </div>
                <br/>
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Descrição do problema</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4"
                                  disabled><?php echo $ocorrencia['descricao'] ?></textarea>
                    </div>
                </div>
                <br/>

                <!-- Descriçao da endereço -->
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">CEP</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['cep']; ?>" disabled>
                    </div>
                    <label class="col-sm-2 text-right">Logradouro</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['logradouro']; ?>"
                               disabled>
                    </div>
                </div>
                <br/>
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Numero</label>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['numPredialProx']; ?>"
                               disabled>
                    </div>
                    <label class="col-sm-2 text-right">Complemento</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['complemento']; ?>"
                               disabled>
                    </div>
                </div>
                <br/>
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Bairro</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['bairro']; ?>" disabled>
                    </div>
                    <label class="col-sm-1 text-right">Cidade</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['cidade']; ?>" disabled>
                    </div>
                    <label class="col-sm-1 text-right">UF</label>
                    <div class="col-sm-1">
                        <input type="text" class="form-control" value="<?php echo $ocorrencia['uf']; ?>" disabled>
                    </div>
                </div>
                <br/>
                <div class="row" style="padding-right: 30px">
                    <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4"
                                  disabled><?php echo $ocorrencia['observacao'] ?></textarea>
                    </div>
                </div>
                <br/>
                <a href="home.php">
                    <button class="btn btn-primary btn-lg" style="margin-left: 30px;">&laquo; Voltar</button>
                </a>
            </form>

            <?php
        } else {
            echo "<script>
                alert('A ocorrência informada não foi encontrada');
            </script>";
        }

    } else {

        echo "<script>
                alert('Ocorreu um erro ao exibir os detalhes da ocorrencia informada');
            </script>";
    }
    //header("Location: home.php");
    //exit;
}