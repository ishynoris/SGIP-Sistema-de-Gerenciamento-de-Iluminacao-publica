<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include 'function.php';

$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado = $dtibd -> executarQuery("select","SELECT COUNT(id) as quantidade, status as status FROM ocorrencia GROUP BY status");



$data = array();
foreach($resultado as $result){
	$itens = array($result['status'], $result['quantidade']); 
	array_push($data, $itens);
}
                 
$plot = new PHPlot(800,600);
$plot->SetImageBorderType('raised');
$plot->SetPlotType('bars');
$plot->SetDataType('text-data');
$plot->SetDataValues($data);

$plot->SetTitle("Indice de reclamações");

$plot->DrawGraph();
?>