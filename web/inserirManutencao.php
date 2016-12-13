<?php
header("Access-Control-Allow-Origin: *");
include ('classes/manutencao.class.php');

$endereco = $_POST['address'];

$manutencao = new manutencao;
$manutencao->nomeSolicitante = $_POST['nomeSolicitante'];
$manutencao->contato = $_POST['contato'];
$manutencao->email = $_POST['email'];
$manutencao->tipoServico = $_POST['tipoServico'];
$manutencao->prioridade = $_POST['prioridade'];
$manutencao->observacoes = $_POST['observacao'];
$manutencao->localdeDestino = $_POST['pontoIluminacao'];
$manutencao->ocorrencia = $_POST['ocorrencia'];
$manutencao->localdePartida = "Avenida deusdedith salgado, 2100, Juiz de Fora , Minas Gerais";
$manutencao->inserirManutencao();
$manutencao->atualizarOcorrencia($_POST['ocorrencia']);

echo "success";
?>