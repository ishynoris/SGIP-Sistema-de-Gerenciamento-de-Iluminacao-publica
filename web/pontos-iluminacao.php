<?php
include 'header.php';
include 'menu-top.php';
include 'controller/PontoIluminacaoController.class.php';
include 'classes/Usuario.class.php';

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
    .filter{
        background: #fff;
        color: #000;
        border: 1px solid #ccc;padding: 0px !important;
    }
</style>
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
                        $pontos = PontoIluminacaoController::getAll();
                        foreach ($pontos as $ponto) {
?>
                            <tbody>
                            <tr>
                                <td class="tdPers col-lg-1"><?php echo $ponto['numeroDaPlaca'] ?></td>
                                <td class="tdPers col-lg-7"><?php echo $ponto['logradouro'] ?></td>
                                <td class="tdPers col-lg-1"><?php echo $ponto['statusConservacao'] ?></td>
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

<?php
include 'footer.php';
?>
