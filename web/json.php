<?php 
   include ('classes/conecta_bancoAdmin.php');
   $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
   $query = $dtibd->executarQuery("select",
      "SELECT pi.*, pm.lat, pm.lng, cpi.* 
      FROM `pontoiluminacao` pi 
      JOIN pontosmapa pm ON pm.address = pi.logradouro 
      JOIN caracteristicaspontoiluminacao cpi on cpi.idPontoIluminacao = pi.id");

   $result = "";
   $result .= '{"type":"FeatureCollection",
            "features":[';
   foreach($query as $row){
      $result .= '{
         "type":"Feature",
         "properties":{  
            "Logradouro":"'. $row['logradouro'] .'",
            "Estado de conservação":"'. $row['statusConservacao'] .'",
            "Refrator":"'. $row['refrator'] .'",
            "Tipo de Reator":"'. $row['tipoReator'] .'",
            "Potencia do Reator":"'. $row['potenciaDoReator'] .'",
            "Modelo do Braço":"'. $row['modeloBraco'] .'",
            "Modelo Luminaria":"'. $row['modeloLuminaria'] .'",
            "Tipo da Lampada":"'. $row['tipoLampada'] .'",
            "Potencia da Lampada":"'. $row['potenciaLampada'] .'"           
         },
         "geometry":{  
            "type":"Point",
            "coordinates":[  
               '. $row['lng'] .',
               '. $row['lat'] .'               
            ]
         }
      },
    ';
   }
   $result .= ']}';

   $replace = str_replace('} }, ] }', '} } ] }', trim($result));

   echo $replace;
?>
         
         