<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include 'function.php';

$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado = $dtibd -> executarQuery("select","SELECT COUNT(id) as quantidade, tipoComponente as tipoComponente FROM componentes GROUP BY tipoComponente");



$data = array();
foreach($resultado as $result){
	$itens = array($result['tipoComponente'], $result['quantidade']); 
	array_push($data, $itens);
}
                 
$plot = new PHPlot(800,600);
$plot->SetImageBorderType('plain');
$plot->SetPlotType('pie');
$plot->SetDataType('text-data-single');
$plot->SetDataValues($data);
$plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
                        'magenta', 'brown', 'lavender', 'pink',
                        'gray', 'orange'));


$plot->SetTitle("Indices de material");
foreach ($data as $row)
	$plot->SetLegend(implode(': ', $row));

$plot->SetLegendPixels(5, 5);

$plot->DrawGraph();
?>