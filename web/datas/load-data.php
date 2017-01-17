<?php
    include '../classes/conecta_bancoAdmin.php';
    include '../classes/PontoIluminacao.class.php';
    include '../classes/PontoMapa.class.php';
    include '../classes/CaracteristicaPontoILuminacao.class.php';
    include '../classes/Endereco.class.php';

    //include '../controller/PontoIluminacaoController.class.php';

new ExtractData("IP - Socorro_1.txt");
    

class ExtractData 
{   
    
    const NUMERO = 1;
    const TIPO_LAMPADA = 15;
    const TIPO_POSTE = 18;
    const TAM_BRACO = 19;
    const TAM_POSTE = 20;
    const POTENCIA_REATOR = 43;
    const POTENCIA_LAMPADA = 31;
    const MODELO_LUMINARIA = 25;
    const LOCATION = 53;
    const LAT = 1;
    const LNG = 0;
    /*
    const NUMERO = 0;
    const TIPO_LAMPADA = 14;
    const TIPO_POSTE = 17;
    const TAM_BRACO = 18;
    const TAM_POSTE = 19;
    const POTENCIA_REATOR = 42;
    const POTENCIA_LAMPADA = 30;
    const MODELO_LUMINARIA = 24;
    const LOCATION = 52;
    const LAT = 1;
    const LNG = 0;
    */

    const V_NUM_PREDIAL = array("street_number");
    const V_LOGRADOURO = array("route");
    const V_BAIRRO = array("sublocality", "sublocality_level_1");
    const V_CIDADE = array("locality", "administrative_area_level_2");
    const V_UF = array("administrative_area_level_1");
    const V_CEP = array("postal_code");

    function __construct($fileName)
    {
        $file = $this->loadFile($fileName);
        $this->extractData($file);
        //$this->setQuerys($file);
    }

    private function loadFile($fileName)
    {
        $raiz = getcwd();
        return file("{$raiz}/{$fileName}");
    }

    private function extractData($file)
    {
        $i = 2451;
        $n = 3000;
        //$n = count($file);
        for(; $i < $n; $i++)
        {
            $values = explode("#", $file[$i]);

            /*
            echo "$i<br>";
            var_dump(array_values($values));
            echo "<br>";
            */
           
            $numero = explode(":", $values[ExtractData::NUMERO])[1];
            
            $rele = "Não informado";
            $tipoLampada = explode(":", $values[ExtractData::TIPO_LAMPADA])[1];
            $tipoPoste = explode(":", $values[ExtractData::TIPO_POSTE])[1];
            $tamBraco = explode(":", $values[ExtractData::TAM_BRACO])[1];
            $tamPoste = $this->getInt(explode(":", $values[ExtractData::TAM_POSTE])[1]);
            $tipoReator = "Não informado";
            $potReator = $this->getInt(explode(":", $values[ExtractData::POTENCIA_REATOR])[1]);
            $modeloReator = "Não informado";
            $potLampada = $this->getInt(explode(":", $values[ExtractData::POTENCIA_LAMPADA])[1]);
            $modeloLuminaria = explode(":", $values[ExtractData::MODELO_LUMINARIA])[1];
            $tipoLuminaria = "Não informado";
            $observacao = "Adicionado a partir de dados enviados por arquivo.";
            $location = explode(":", $values[ExtractData::LOCATION])[1];
            $lat = $this->getFloat(explode(",", $location)[ExtractData::LAT]);
            $lng = $this->getFloat(explode(",", $location)[ExtractData::LNG]);
            
            $values = $this->getAddress($lat, $lng);                  
            
            echo "$i<br>";            
            echo "LOGRADOURO: {$values['logradouro']}, {$values['numPredialProx']} - {$values['cep']} <br>";
            echo "NUMERO: {$numero} <br>";
            echo "TIPO_LAMPADA: {$tipoLampada} <br>";
            echo "TIPO_POSTE: {$tipoPoste} <br>";
            echo "TAM_BRACO: {$tamBraco} <br>";
            echo "TAM_POSTE: {$tamPoste} <br>";
            echo "POTENCIA_REATOR: {$potReator} <br>";
            echo "POTENCIA_LAMPADA: {$potLampada} <br>";
            echo "MODELO_LUMINARIA: {$modeloLuminaria} <br>";
            echo "LOCATION: {$location} <br>";
            echo "LAT: $lat <br>";
            echo "LNG: $lng <br><br>";
            
            
            $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
            //$cep, $logradouro, $numPredialProx, $complemento, $bairro, $cidade, $uf, $observacao
            $endereco = new Endereco($values['cep'], $values['logradouro'], $values['numPredialProx'], 
                            $observacao, $values['bairro'], $values['cidade'], $values['uf'], $observacao);
            $idEndereco = $endereco->saveDB($dtibd); echo "endereco.saveDB() -> ";
            
            $pontoIluminacao = new PontoIluminacao(PontoIluminacao::V_RAZOAVEL, $numero);
            $idPonto = $pontoIluminacao->saveDB($idEndereco, $dtibd);  echo "pontoIluminacao.saveDB() -> ";
 
            $caracteristica = new CaracteristicaPontoILuminacao($tamPoste, $tipoPoste, $rele, $tipoLampada, 
                            $potLampada, $tipoLuminaria, $modeloLuminaria, $tamBraco, $tipoReator, 
                            $modeloReator, $potReator, $observacao);                
            $caracteristica->saveDB($idPonto, $dtibd); echo "caracteristica.saveDB() -> ";

            $pontoMapa = new PontoMapa($lat, $lng);
            $pontoMapa->saveDB($idPonto, $dtibd);  echo "pontoMapa.saveDB()<br><br>";
            //echo "<br><br>";
        }
        //echo $qrAdress;
    }
    
    private function getAddress($lat, $lng)
    {
        $content = file_get_contents("http://maps.google.com/maps/api/geocode/json?latlng=$lat,$lng");
        $json = json_decode($content);
    
        $values = array('cep'=> 0, 'logradouro' => 'Não indentificado', 'numPredialProx' => -1, 
                    'bairro' => 'Não indentificado', 'cidade' => 'Não indentificado', 'uf' => '--');

        if($json->{'status'} == "OK")
        {
            $components = $json->{'results'}[0]->{'address_components'};
            foreach ($components as $component)
            {   
                $map = $this->setTagValue($component, $values);
                if(!empty($map)){
                    $key = array_keys($map)[0];
                    $value = array_values($map)[0];
                    $values[$key] = $value;
                }
            } 
        }
        return $values;
    }

    private function setTagValue($component, $values)
    {
        $types = $component->{'types'};
        foreach($types as $type)
        {
            if($type == ExtractData::V_NUM_PREDIAL[0])
            {
                return array('numPredialProx' => $component->{'short_name'});
            } 
            else  if($type == ExtractData::V_LOGRADOURO[0])
            {
                return array('logradouro' => $component->{'short_name'});
            }
            else  if($type == ExtractData::V_BAIRRO[0] || $type == ExtractData::V_BAIRRO[1])
            {
                return array('bairro' => $component->{'short_name'});
            }
            else  if($type == ExtractData::V_CIDADE[0] || $type == ExtractData::V_CIDADE[1])
            {
                return array('cidade' => $component->{'short_name'});
            }
            else  if($type == ExtractData::V_UF[0])
            {
                return array('uf' => $component->{'short_name'});
            }
            else  if($type == ExtractData::V_CEP[0])
            {
                return array('cep' => $component->{'short_name'});
            }
        }
    }

    private function getInt($value)
    {   
        return (int) str_replace(" ", "", $value);
    }

    private function getFloat($value)
    {
        return (float) str_replace(" ", "", $value);
    }
}
/*
c_id    2176
e.id    2236
pm.id   2174
pi.id   2187

SELECT e.id AS "e.id", pi.id as "pi.id, pm.id AS "pm.id", c.id AS "c_id"" 
FROM endereco AS e 
INNER JOIN pontoiluminacao AS pi 
INNER JOIN caracteristicaspontoiluminacao AS c 
INNER JOIN pontosmapa AS pm 
ON pi.id_endereco = e.id 
AND pm.id_ponto = pi.id 
AND c.id_ponto_iluminacao = pi.id 
WHERE pi.numeroDaPlaca = :placa     26302445
*/

?>

