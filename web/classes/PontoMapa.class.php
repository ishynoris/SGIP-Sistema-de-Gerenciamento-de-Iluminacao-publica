<?php
include 'conecta_bancoAdmin.php';

class PontoMapa{

    private $table = "pontosmapa";
    private $region = "Brasil";

    private $lat;
    private $lng;

    function __construct()
    {
        $nArgs = func_num_args();
        $args = func_get_args();

        if($nArgs < 1 || $nArgs > 2)
        {
            echo "A quantidade de parâmetros do construtor não é aceita.\n";
            die;
        } 
        else 
        {
            $this->lat = 0;
            $this->lng = 0;

            if($nArgs == 1)
            {   
                $this->setAddress($args[0]);
            } 
            else 
            {
                $this->setLocation($args[0], $args[1]);
            }
        }
    }

    private function setAddress($address)
    {
        $address = urlencode($address);
        
        $content = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&region=$this->region");
        $json = json_decode($content);
        if($json->{'results'} == "OK"){
            
            $this->lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
            $this->lng = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
        }
    }

    private function setLocation($lat, $lng)
    {
        $this->lat = $lat;
        $this->lng = $lng;
    }

    public function saveDB($idPonto, $dtibd)
    {
        try{
            $query = "INSERT INTO $this->table (lat, lng, id_ponto)
                        VALUES (:lat, :lng, :idPonto)";    
            $values = array(":lat" => $this->lat, 
                        ":lng" => $this->lng,
                        ":idPonto" => $idPonto);
            $dtibd->executarQuery("insert",$query, $values);

    	}catch(PDOException $e){
			echo "Erro ao inserir [IdPntoIluminacao={$idPonto}]: " . $e->getMessage() . "\n";
        	die();
		}
    }

    public function delete($idPonto, $dtibd)
    {
        try{
            $query = "DELETE FROM $this->table WHERE id_ponto = :idPonto";
            $values = array(":idPonto" => (int) $idPonto);
            return $dtibd->executarQuery("delete", $query, $values);

		} catch (PDOException $e){
			echo "Erro ao excluir [IdPntoIluminacao={$idPonto}]: " . $e->getMessage() . "\n";
        	die();
		}
    }
}
?>