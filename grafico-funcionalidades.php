<?php
header('Content-Type: text/html; charset=utf-8');
require_once 'phplot.php';
include './classes/Dtidb.class.php';

    $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

    $counts = array(
        $dtibd->executarQuery("select","SELECT COUNT(id) as 'count' FROM pontoiluminacao")[0],
        $dtibd->executarQuery("select","SELECT COUNT(id) as 'count' FROM manutencao")[0],
        $dtibd->executarQuery("select","SELECT COUNT(id) as 'count' FROM ocorrencia")[0],
        $dtibd->executarQuery("select","SELECT COUNT(id) as 'count' FROM componentes")[0],
        $dtibd->executarQuery("select","SELECT COUNT(id) as 'count' FROM usuario")[0]
    );

    $data = array(
        array('P. Iluminacao' , $counts[0]['count']),
        array('Manutencao' , $counts[1]['count']),
        array('Atendimento' , $counts[2]['count']),
        array('Componentes' , $counts[3]['count']),
        array('usuario' , $counts[4]['count'])
    );

    $plot = new PHPlot(500 , 500);
    $plot->SetPrecisionY(1);
    $plot->SetPlotType("bars");
    $plot->SetDataType("text-data");
    $plot->SetDataValues($data);
    $plot->SetXTickPos('none');
    $plot->SetAxisFontSize(3);
    $plot->SetYDataLabelPos('plotin');
    $plot->DrawGraph();

echo $data;
?>