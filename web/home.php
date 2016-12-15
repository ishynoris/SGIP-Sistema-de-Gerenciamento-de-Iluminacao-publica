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
    </style>

    <script>
        function setGet() {
            doc = document.getElementById("pid");
            input = document.getElementById("protocol");

            doc.href = "pesquisar-ocorrencia.php";
            if(input.value != ""){
                doc.href += "?pid=" + input.value;
            }
        }

        function confirmDelete(protocolo) {

            if(confirm("Você realmente deseja remover essa ocorrência?\nEssa remoção é irreversível.")){
                location.href = "remover-ocorrencia.php?pid=" + protocolo;
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

                <div class="form-group" style="margin-bottom: 50px">
                    <div class="row">
                        <label class="col-sm-2 text-right">Protocolo</label>
                        <div class="col-sm-3">
                            <input id="protocol" name="protocol" class="form-control" value="201659715"
                                   placeholder="Digite aqui o número do protocolo">
                        </div>

                        <div class="col-sm-1">
                            <a target="_blank" id="pid" href="#">
                                <button onclick="setGet()" type="submit" name="<?php echo OcorrenciaController::BTN_SEARCH ?>" class="btn btn-primary" style="float: left">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </a>
                        </div>
                        <div class="col-sm-6">
                            <a target="_blank" href="nova-ocorrenca.php" style="float: right">
                                <button class="btn btn-primary" >Nova ocorrência</button>
                            </a>
                        </div>
                    </div>
                </div>

                <table class="table table-striped table-hover" width="100%">
                    <tr style="background-color: #2b669a; color: #FFFFFF">
                        <td class="tdPers col-lg-1"><strong>Protocolo</strong></td>
                        <td class="tdPers col-lg-1"><strong>Status</strong></td>
                        <td class="tdPers col-lg-3"><strong>Manutencao</strong></td>
                        <td class="tdPers col-lg-5"><strong>Descricao</strong></td>
                        <td class="tdPers col-lg-1"><strong>Detalhes</strong></td>
                        <td class="tdPers col-lg-1"><strong>Remover</strong></td>
                    </tr>

                    <?php
                    $uid = $_SESSION['id'];
                    $ocorrencias = OcorrenciaController::getByUserId($uid);
                    foreach ($ocorrencias as $ocorrencia) {
                        ?>
                        <tr>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['protocolo'] ?></td>
                            <td class="tdPers col-lg-1"><?php echo $ocorrencia['status'] ?></td>
                            <td class="tdPers col-lg-3"><?php echo $ocorrencia['manutencao'] ?></td>
                            <td class="tdPers col-lg-5"><?php echo $ocorrencia['descricao'] ?></td>
                            <td class="tdPers col-lg-1">
                                <a target="_blank" href="detalhes-ocorrencia.php?pid=<?php echo $ocorrencia['protocolo']?>">
                                    <button class="btn btn-success"><span class="glyphicon glyphicon-info-sign"></span></button>
                                </a>
                            </td>
                            <td class="tdPers col-lg-1">
                                <button onclick="confirmDelete(<?php echo $ocorrencia['protocolo']?>);"
                                        class="btn btn-danger"><span class="glyphicon glyphicon-trash"></button>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
<?php
} else { // Não-usuário
?>
    <div class="row" style="padding: 50px;">
        <div class="col-sm-6">
            <div class="table-responsive box-relatorio">
                <table class="bk" width="100%" id="tabela">
                    <legend class="legend">Ultimos Pontos Cadastrados</legend>

                    <?php $lightPoints = HomeController::getLastLightPoints();
                    $i = 1;
                    foreach ((array)$lightPoints as $lightPoint) {
                        ?>
                        <tr>
                            <td class="tdPers">#<?php echo $i++; ?></td>
                            <td class="tdPers"><?php echo $lightPoint['logradouro']; ?></td>
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
    <?php
}
?>