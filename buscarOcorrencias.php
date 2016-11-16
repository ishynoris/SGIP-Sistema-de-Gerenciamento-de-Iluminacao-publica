<?php

include 'function.php';
$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado = $dtibd->executarQuery("select","SELECT * FROM ocorrencia WHERE status <> 'Em Manutenção'");

echo json_encode($resultado);

?>