<?php

include 'function.php';
$dtibd = new Dtidb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado = $dtibd->executarQuery("select","SELECT * FROM pontoiluminacao");

echo json_encode($resultado);

?>