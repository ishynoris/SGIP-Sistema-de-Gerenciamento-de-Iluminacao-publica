<?php
header("Access-Control-Allow-Origin: *");
include ('classes/pontoIluminacao.class.php');

$endereco = $_POST['address'];

$pontoiluminacao = new pontoiluminacao;
$pontoiluminacao->logradouro = $endereco;
$pontoiluminacao->statusConservacao = $_POST['statusConservacao'];
$pontoiluminacao->numeroDaPlaca = $_POST['numeroDaPlaca'];
$utilmaIdInserida = $pontoiluminacao->salvarPontoIluminacao();

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
$pontoiluminacao->imagem = "data/" . $_POST['photo'];
$pontoiluminacao->observacoes = $_POST['edtObservacoes'];
$pontoiluminacao->salvarCaracteristicasPontoIluminacao($utilmaIdInserida);

$pontoiluminacao->pontosmapa($_POST['lat'],$_POST['long'],"restaurant");

echo "success";
?>