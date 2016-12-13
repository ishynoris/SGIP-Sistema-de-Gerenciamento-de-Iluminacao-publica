<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include './classes/Dtidb.class.php';

    $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
    $resultado = $dtibd -> executarQuery("select",
        "SELECT COUNT(id) as quantidade, tipoServico as tipoServico 
        FROM manutencao GROUP BY tipoServico");

    $data = array();
    foreach($resultado as $result){
        $itens = array($result['tipoServico'], $result['quantidade']);
        array_push($data, $itens);
    }

    $plot = new PHPlot(500,500);
    $plot->SetAxisFontSize(3);
    $plot->SetImageBorderType('plain');
    $plot->SetPlotType('bars');
    $plot->SetDataType('text-data');
    $plot->SetDataValues($data);
    $plot->DrawGraph();

?>