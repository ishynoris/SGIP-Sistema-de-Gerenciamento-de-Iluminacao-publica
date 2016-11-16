<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include 'function.php';

$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

$resultado1 = $dtibd -> executarQuery("select","SELECT COUNT(id) as Quantidade FROM pontoiluminacao");
$resultado2 = $dtibd -> executarQuery("select","SELECT COUNT(id) as Quantidade FROM manutencao");
$resultado3 = $dtibd -> executarQuery("select","SELECT COUNT(id) as Quantidade FROM ocorrencia");
$resultado4 = $dtibd -> executarQuery("select","SELECT COUNT(id) as Quantidade FROM componentes");
$resultado5 = $dtibd -> executarQuery("select","SELECT COUNT(id) as Quantidade FROM usuario");
 

$data = array(
	array('PI' , $resultado1[0]['Quantidade'] ), 
	array('Manutencao' , $resultado2[0]['Quantidade'] ),
	array('Atendimento' , $resultado3[0]['Quantidade'] ),
	array('Componentes' , $resultado4[0]['Quantidade'] ),
	array('usuario' , $resultado5[0]['Quantidade'] )
);     
                 
$plot = new PHPlot(500 , 350);     
  
$plot->SetTitle('Indice de Funcionalidades');
$plot->SetPrecisionY(1);
$plot->SetPlotType("bars");
$plot->SetDataType("text-data");
$plot->SetDataValues($data);
$plot->SetBackgroundColor("#ececec");
$plot->SetXTickPos('none');
$plot->SetXLabel("");
$plot->SetXLabelFontSize(2);
$plot->SetAxisFontSize(2);
$plot->SetYDataLabelPos('plotin');
$plot->DrawGraph();
?>