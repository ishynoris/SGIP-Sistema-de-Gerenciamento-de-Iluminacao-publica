<?php
include 'header.php';
include 'menu-top.php';
include './controller/OcorrenciaController.class.php';
include './controller/HomeController.class.php';

$protocol = '';
?>
    <style>
        .line{
            padding: 30px;
            margin: 70px 20px 0px 50px;
        }
        .filter{
            background: #fff;
            color: #000;
            border: 1px solid #ccc;padding: 0px !important;
        }
    </style>
    <script>

        function confirmDelete(protocolo) {

            if(confirm("Você realmente deseja remover essa ocorrência?\nEssa remoção é irreversível.")){
                location.href = "excluir-ocorrencia.php?pid=" + protocolo;
            }
        }
    </script>
    <div class="row">

<?php
    include 'menu-left.php';
    if ($_SESSION['isAdmin'] == Usuario::USUARIO) {
?>

        <div class="col-sm-10">
            <div class="bk line" >
                <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                            class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Minhas ocorrências</legend>
                <div class="table-responsive">
                    <table width="100%">
                        <tr style="background-color: #2b669a; color: #FFFFFF;">
                            <td class="tdPers col-lg-1"><strong>Protocolo</strong></td>
                            <td class="tdPers col-lg-1"><strong>Status</strong></td>
                            <td class="tdPers col-lg-3"><strong>Manutencao</strong></td>
                            <td class="tdPers col-lg-5"><strong>Descricao</strong></td>
                            <td class="tdPers col-lg-1"><strong>Detalhes</strong></td>
                            <td class="tdPers col-lg-1"><strong>Remover</strong></td>
                        </tr>
<?php
                        $ocorrencias = OcorrenciaController::getByUserId($_SESSION['id']);
                        foreach ($ocorrencias as $ocorrencia) {
?>
                        <tr>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['protocolo'] ?></td>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['status'] ?></td>
                            <td class="tdPers col-lg-3"><?php echo $ocorrencia['manutencao'] ?></td>
                            <td class="tdPers col-lg-5"><?php echo $ocorrencia['descricao'] ?></td>
                            <td class="tdPers col-lg-1">
                                <a href="detalhes-ocorrencia.php?pid=<?php echo $ocorrencia['protocolo']?>">
                                    <button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-info-sign"></span></button>
                                </a>
                            </td>
                            <td class="tdPers col-lg-1">
                                <button onclick="confirmDelete(<?php echo $ocorrencia['protocolo']?>);"
                                        class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></button>
                            </td>
                        </tr>
<?php                   }
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php
    } else if ($_SESSION['isAdmin'] == Usuario::ADMIN) {
?>
    <div class="col-sm-10"  style="padding-top: 20px">
        <div class="row" style="padding: 50px;">
            <div class="col-sm-6">
                <div class="table-responsive box-relatorio">
                    <table class="bk" width="100%" id="tabela">
                        <legend class="legend">Ultimos Pontos de iluminação Cadastrados</legend>

                        <?php $lightPoints = HomeController::getLastLightPoints();
                        $i = 1;
                        // logradouro, numPredialProx. bairro, cidade - UF
                        foreach ((array)$lightPoints as $lightPoint) {
                            $address = $lightPoint['logradouro'] .', '. $lightPoint['numPredialProx'] .'. '. 
                                        $lightPoint['bairro'] .', '. $lightPoint['cidade'] .' - '. $lightPoint['uf'];
                            ?>
                            <tr>
                                <td class="tdPers">#<?php echo $i++; ?></td>
                                <td class="tdPers"><?php echo $address; ?></td>
                            </tr>
                        <?php }
                        ?>
                    </table>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="table-responsive box-relatorio">
                    <table class="bk" width="100%">
                        <legend class="legend">Ultimos Usuarios Cadastrados</legend>

                        <?php $buscarUsuario = HomeController::getLastUserName();
                        $i = 1;
                        foreach ($buscarUsuario as $lightPoint) {
                            ?>
                            <tr>
                                <td class="tdPers">#<?php echo $i++; ?></td>
                                <td class="tdPers"><?php echo $lightPoint['usuario']; ?></td>
                            </tr>
                        <?php }
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
            <div class="bk col-sm-6">
                <legend class="legend" style="padding: 20px">Grafico das Componentes</legend>
                <img src="grafico-componentes.php" style="width: 100%;">
            </div>
        </div>
        <div class="row" style="padding: 0px 50px 50px 50px ;">
            <div class="bk col-sm-6">
                <legend class="legend" style="padding: 20px">Grafico das Ocorrências</legend>
                <img src="grafico-ocorrencias.php" style="width: 100%;">
            </div>
            <div class="bk col-sm-6">
                <legend class="legend" style="padding: 20px">Grafico das Manutenções</legend>
                <img src="grafico-manutencao.php" style="width: 100%;">
            </div>
        </div>
    </div>
<?php
    } if ($_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
    <div class="col-sm-10">
        <div class="bk line" >
            <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                        class="glyphicon glyphicon-map-marker"></span>&nbsp;&nbsp;&nbsp;Todas as ocorrências</legend>

            <div class="table-responsive">
                <table id="tabela" class="bk" width="100%">

                    <thead>
                        <tr id="titulo" style="background-color: #2b669a; color: #FFFFFF;">
                            <td class="tdPers col-lg-1"><strong>Protocolo</strong></td>
                            <td class="tdPers col-lg-1"><strong>Status</strong></td>
                            <td class="tdPers col-lg-3"><strong>Manutencao</strong></td>
                            <td class="tdPers col-lg-4"><strong>Descricao</strong></td>
                            <td class="tdPers col-lg-1"><strong>Prioridade</strong></td>
                            <td class="tdPers col-lg-1"><strong>Detalhes</strong></td>
                            <td class="tdPers col-lg-1"><strong>Remover</strong></td>
                        </tr>

                        <tr>
                            <th class="filter"><input type="text" id="txtColuna1" class="form-control" placeholder="Pesquisar protocolo"/></th>
                            <th class="filter"><input type="text" id="txtColuna2" class="form-control" placeholder="Pesquisar status"/></th>
                            <th class="filter"><input type="text" id="txtColuna3" class="form-control" placeholder="Pesquisar manutenção"/></th>
                            <th class="filter"><input type="text" id="txtColuna4" class="form-control" placeholder="Pesquisar descricao"/></th>
                            <th class="filter"></th>
                            <th class="filter"></th>
                            <th class="filter"></th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                    $ocorrencias = OcorrenciaController::getAllOpen();
                    foreach ($ocorrencias as $ocorrencia) {

                        $status = '';
                        switch($ocorrencia['prioridade']) {
                            case Ocorrencia::V_PRIO_BAIXA: $status = "btn-success"; break;
                            case Ocorrencia::V_PRIO_MEDIA: $status = "btn-warning"; break;
                            case Ocorrencia::V_PRIO_ALTA: $status = "btn-danger"; break;
                        }
?>

                        <tr>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['protocolo'] ?></td>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['status'] ?></td>
                            <td class="tdPers col-lg-3"><?php echo $ocorrencia['manutencao'] ?></td>
                            <td class="tdPers col-lg-4"><?php echo $ocorrencia['descricao'] ?></td>
                            <td class="tdPers">
                                <a class="btn btn-lg <?php echo $status?> disabled">
                                    <span class=" glyphicon glyphicon-time"></span>
                                </a>
                            </td>
                            <td class="tdPers">
                                <a href="detalhes-ocorrencia.php?pid=<?php echo $ocorrencia['protocolo']?>">
                                    <button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-info-sign"></span></button>
                                </a>
                            </td>
                            <td class="tdPers">
                                <button onclick="confirmDelete(<?php echo $ocorrencia['protocolo']?>);"
                                        class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></button>
                            </td>
                        </tr>
<?php
                    }
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
    } if ($_SESSION['isAdmin'] == Usuario::ATENDENTE) {

    } else {
        echo "Error";
    }
?>