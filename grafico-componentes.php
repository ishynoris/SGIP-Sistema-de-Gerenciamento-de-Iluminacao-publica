<?php

header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include './classes/Dtidb.class.php';

    $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

    $resultado = $dtibd -> executarQuery("select",
        "SELECT COUNT(id) as quantidade, tipoComponente as tipoComponente 
        FROM componentes GROUP BY tipoComponente");

    $data = array();
    $plot = new PHPlot(500 , 500);

    foreach($resultado as $result){
        $itens = array($result['tipoComponente'], $result['quantidade']);
        array_push($data, $itens);
    }
    foreach ($data as $row) {
        $plot->SetLegend(implode(': ', $row));
    }

    $plot->SetAxisFontSize(3);
    $plot->SetImageBorderType('plain');
    $plot->SetPlotType('pie');
    $plot->SetDataType('text-data-single');
    $plot->SetDataValues($data);
    $plot->SetDataColors(array('red', 'green', 'blue', 'yellow', 'cyan',
        'magenta', 'brown', 'lavender', 'pink','gray', 'orange'));
    $plot->SetLegendPixels(5, 5);
    $plot->DrawGraph();
?>