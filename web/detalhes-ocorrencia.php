<?php

    include './header.php';
    include './menu-top.php';
    include_once './controller/NovaOcorrenciaController.class.php';
    $protocolo = $_GET['pid'];
    $uid = $_SESSION['id'];
?>

    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
    </style>
<?php
    if(empty($protocolo) || empty($uid)){

        header("Location: home.php");
        exit;
    } else {

        if ($uid == $_SESSION['id']){
?>
        <div class="row">
<?php
            include 'menu-left.php';
            $ocorrencia = NovaOcorrenciaController::getDetails($protocolo, $uid);
            if (isset($ocorrencia[0])){
?>
                <div class="col-sm-10">
                    <div class="bk line">
                    <legend style="padding-bottom:10px; margin-bottom: 50px"><span class="glyphicon glyphicon-ok"></span>
                        &nbsp;&nbsp;&nbsp;Ocorrencia encontrada
                    </legend>

                    <!-- Detalhes do munícipe -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['usuario']; ?>" disabled>
                        </div>
                    </div>
                    <br/>

                    <!-- Descriçao da ocorrência -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Protocolo</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['protocolo']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Manutenção</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['manutencao']; ?>" disabled>
                        </div>
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Status</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['status']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Data de registro</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['data_inicio']; ?>"
                                   disabled>
                        </div>
                        <label class="col-sm-2 text-right">Prazo final</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['prazo']; ?>" disabled>
                        </div>
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Descrição do problema</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4"
                                      disabled><?php echo $ocorrencia[0]['descricao'] ?></textarea>
                        </div>
                    </div>
                    <br/>

                    <!-- Descriçao da endereço -->
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">CEP</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['cep']; ?>" disabled>
                        </div>
                        <label class="col-sm-2 text-right">Logradouro</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['logradouro']; ?>"
                                   disabled>
                        </div>
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Numero</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['numPredialProx']; ?>"
                                   disabled>
                        </div>
                        <label class="col-sm-2 text-right">Complemento</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['complemento']; ?>"
                                   disabled>
                        </div>
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Bairro</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['bairro']; ?>" disabled>
                        </div>
                        <label class="col-sm-1 text-right">Cidade</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['cidade']; ?>" disabled>
                        </div>
                        <label class="col-sm-1 text-right">UF</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" value="<?php echo $ocorrencia[0]['uf']; ?>" disabled>
                        </div>
                    </div>
                    <br/>
                    <div class="row" style="padding-right: 30px">
                        <label class="col-sm-2 text-right">Observação sobre o endereço</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="4"
                                      disabled><?php echo $ocorrencia[0]['observacao'] ?></textarea>
                        </div>
                    </div>
                    <br/>
                    <a href="home.php">
                        <button class="btn btn-primary btn-lg" style="margin-left: 30px;">&laquo; Voltar</button>
                    </a>
                </div>
                </div>
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
            header("Location: home.php");
            exit;
        }
    }
?>
    </div>
