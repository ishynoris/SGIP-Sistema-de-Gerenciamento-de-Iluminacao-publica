<?php
    include 'header.php';
    include 'menu-top.php';
    include 'controller/PontoIluminacaoController.class.php';
    include 'classes/Usuario.class.php'
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
    <script type="text/javascript" src="js/mapas.js"></script>

    <div class="row">

<?php
    include 'menu-left.php';
?>
        <div class="col-sm-10">
            <div class="bk line" >
                <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                            class="glyphicon glyphicon-globe"></span>&nbsp;&nbsp;&nbsp;Parque de iluminação</legend>

                <div id="mapDiv" style="margin-bottom: 30px"></div>

                <div class="table-responsive">
                    <table id="tabela" width="100%">
                        <thead>
                            <tr id="titulo" style="background-color: #2b669a; color: #FFFFFF;">
                                <td class="tdPers col-lg-1"><strong>Placa</strong></td>
                                <td class="tdPers col-lg-7"><strong>Logradouro</strong></td>
                                <td class="tdPers col-lg-1"><strong>Conservação</strong></td>
                                <td class="tdPers col-lg-1"><strong>Detalhes</strong></td>
<?php                       if ($_SESSION['isAdmin'] == Usuario::ADMIN || $_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                                <td class="tdPers col-lg-1"><strong>Editar</strong></td>
                                <td class="tdPers col-lg-1"><strong>Remover</strong></td>
<?php                       }
?>
                            </tr>
                            <tr>
                                <th class="filter col-lg-1"><input type="text" id="txtColuna1" class="form-control" placeholder="Pesquisar placa"/></th>
                                <th class="filter col-lg-7"><input type="text" id="txtColuna2" class="form-control" placeholder="Pesquisar logradouro"/></th>
                                <th class="filter col-lg-1"><input type="text" id="txtColuna3" class="form-control" placeholder="Pesquisar status"/></th>
                                <th class="filter col-lg-1"></th>
<?php                       if ($_SESSION['isAdmin'] == Usuario::ADMIN || $_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                                <th class="filter col-lg-1"></th>
                                <th class="filter col-lg-1"></th>
<?php                       }
?>
                            </tr>
                        </thead>
<?php
                        $pontos = PontoIluminacaoController::getAll();
                        foreach ($pontos as $ponto) {

                            $address = $ponto['logradouro'] .', '. $ponto['numPredialProx'] .'. '. 
                                        $ponto['bairro'] .', '. $ponto['cidade'] .' - '. $ponto['uf'];
                            $status = PontoIluminacaoController::getStatus($ponto['statusConservacao']);
?>
                        <tbody>
                            <tr>
                                <td class="tdPers col-lg-1"><?php echo $ponto['numeroDaPlaca'] ?></td>
                                <td class="tdPers col-lg-7"><?php echo $address ?></td>
                                <td class="tdPers col-lg-1"><?php echo $status ?></td>
                                <td class="tdPers col-lg-1">
                                    <a href="detalhesPonto.php?pid=<?php echo $ponto['numeroDaPlaca']; ?>">
                                        <button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-info-sign"></span></button>
                                    </a>
                                </td>
<?php                       if ($_SESSION['isAdmin'] == Usuario::ADMIN || $_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                                <td class="tdPers col-lg-1">
                                    <a href="editarPonto.php?pid=<?php echo $ponto['numeroDaPlaca']; ?>">
                                        <button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </a>
                                </td>
                                <td class="tdPers col-lg-1">
                                    <a href="excluirPonto.php?pid=<?php echo $ponto['numeroDaPlaca']; ?>&log=<?php echo urlencode($ponto['logradouro']); ?>">
                                        <button class="btn btn-lg btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                    </a>
                                </td>
<?php                       }
?>
                            </tr>
                        </tbody>
<?php                   }
?>
                    </table>
                </div>
            </div>
        </div>
    </div>
