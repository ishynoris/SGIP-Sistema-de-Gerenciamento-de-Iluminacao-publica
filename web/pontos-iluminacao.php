<?php
    include 'header.php';
    include 'menu-top.php';
    include 'controller/PontoIluminacaoController.class.php';
    include 'classes/Usuario.class.php';

    $controller = new PontoIluminacaoController();
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
        function confirmDelete(pid, sid){
            if(confirm(pid + " " + sid + " Você realmente deseje apagar esse ponto de iluminação?\nEssa operação é permanente.")){
                window.location.assign("./excluir-ponto.php?pid=" + pid + "&sid=" + sid);
            }
        }
    </script>

<div class="row">
<?php
    include 'menu-left.php';
?>
    <div class="col-sm-10">
        <div class="bk line" >
            <legend style="padding-bottom:10px; margin-bottom: 50px"><span
                    class="glyphicon glyphicon-flash"></span>&nbsp;&nbsp;&nbsp;Pontos de iluminação</legend>

            <div class="row" style="margin-bottom: 30px">
                <div class="col-lg-12 col-xs-12">
                    <a href="novo-ponto-iluminacao.php" style="float: right">
                        <button class="btn btn-primary">Novo ponto de iluminação</button>
                    </a>
                </div>
            </div>

                <div class="table-responsive">
                    <table id="tabela" width="100%">
                        <thead>
                        <tr id="titulo" style="background-color: #2b669a; color: #FFFFFF;">
                            <td class="tdPers col-lg-1"><strong>Placa</strong></td>
                            <td class="tdPers col-lg-7"><strong>Logradouro</strong></td>
                            <td class="tdPers col-lg-1"><strong>Conservação</strong></td>
                            <td class="tdPers col-lg-1"><strong>Detalhes</strong></td>
<?php                   if ($_SESSION['isAdmin'] == Usuario::ADMIN || $_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                            <td class="tdPers col-lg-1"><strong>Editar</strong></td>
                            <td class="tdPers col-lg-1"><strong>Remover</strong></td>
<?php                   }
?>
                        </tr>
                        <tr>
                            <th class="filter"><input type="text" id="txtColuna1" class="form-control" placeholder="Pesquisar placa"/></th>
                            <th class="filter"><input type="text" id="txtColuna2" class="form-control" placeholder="Pesquisar logradouro"/></th>
                            <th class="filter"><input type="text" id="txtColuna3" class="form-control" placeholder="Pesquisar conservação"/></th>
                            <th class="filter"></th>
                            <th class="filter"></th>
                            <th class="filter"></th>
                        </tr>
                        </thead>
<?php
                        $pontos = $controller->getAll();
                        foreach ($pontos as $ponto) {
                            
                            $address = $ponto['logradouro'] .', '. $ponto['numPredialProx'] .'. '. 
                                        $ponto['bairro'] .', '. $ponto['cidade'] .' - '. $ponto['uf'];
?>
                            <tbody>
                            <tr>
                                <td class="tdPers col-lg-1"><?php echo $ponto['numeroDaPlaca'] ?></td>
                                <td class="tdPers col-lg-7"><?php echo $address ?></td>
                                <td class="tdPers col-lg-1"><?php echo $ponto['statusConservacao'] ?></td>
                                <td class="tdPers col-lg-1">
                                    <a href="detalhes-ponto.php?pid=<?php echo $ponto['numeroDaPlaca']; ?>">
                                        <button class="btn btn-lg btn-info"><span class="glyphicon glyphicon-info-sign"></span></button>
                                    </a>
                                </td>
<?php                       if ($_SESSION['isAdmin'] == Usuario::ADMIN || $_SESSION['isAdmin'] == Usuario::TECNICO) {
?>
                                <td class="tdPers col-lg-1">
                                    <a href="editar-ponto.php?pid=<?php echo $ponto['numeroDaPlaca']; ?>">
                                        <button class="btn btn-lg btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                                    </a>
                                </td>
                                <td class="tdPers col-lg-1">

                                    <?php $uid = $ponto['numeroDaPlaca']; $sid = $ponto['statusConservacao'];?>
                                    <button onclick='confirmDelete(<?php echo "{$uid}, {$sid}"; ?>)'
                                        class="btn btn-lg btn-danger"> <span class="glyphicon glyphicon-trash"></span></button>
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

<?php
include 'footer.php';
?>
