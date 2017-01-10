<?php
    include './classes/conecta_bancoAdmin.php';
    include './controller/PontoIluminacaoController.class.php';

    $controller = new PontoIluminacaoController();
    $ids = $controller->getAllIds();

    $result = "{";
    $result .= '"type" : "FeatureCollection",';
    $result .= '"features" : [';
    $i = 1;

    foreach($ids as $id)
    {
        $row = $controller->getDetails($id['id']);
        $json = new PontoIluminacaoJson($controller);

        if(!empty($row)){
            $result .= '{';
            $result .= '"type" : "Feature",';
            $result .= $json->setProperties($row[0]) .",";
            $result .= $json->setGeometry($row[0]);
            $result .= "},";
        }
    }

    $result .= ']}';
    echo str_replace('} }, ] }', '} } ] }', trim($result));

    class PontoIluminacaoJson
    {
        private $controller;

        public function __construct($controller)
        {
            $this->controller = $controller;
        }

        public function setProperties($row)
        {

            $logradouro = $row['logradouro'] .', '. $row['numPredialProx'];
            $conservacao = $this->controller->getStatus($row['statusConservacao']);

            $property =  '"properties":{';
            $property .= '"Logradouro" : "'. $logradouro .'",';
            $property .= '"Estado de conservação" : "'. $conservacao .'",';
            $property .= '"Rele" : "'. $row['rele'] .'",';
            $property .= '"Tipo de Reator" : "'. $row['tipoReator'] .'",';
            $property .= '"Potencia do Reator" : "'. $row['potenciaDoReator'] .'",';
            $property .= '"Modelo do Braço" : "'. $row['modeloBraco'] .'",';
            $property .= '"Modelo Luminaria" : "'. $row['modeloLuminaria'] .'",';
            $property .= '"Tipo da Lampada" : "'. $row['tipoLampada'] .'",';
            $property .= '"Potencia da Lampada" : "'. $row['potenciaLampada'] .'"';
            $property .= "}";

            return $property;
        }

        public function setGeometry($row)
        {
            $geometry = '"geometry":{';
            $geometry .= '"type" : "Point",';
            $geometry .= '"coordinates" : [';
            $geometry .= $row['lng'] .','. $row['lat'];
            $geometry .= ']}';

            return $geometry;
        }
    }
?>
         
         