<?php
include 'conecta_bancoAdmin.php';

class componente{
	
	private $marca;
	private $fabricante;
	private $numeroSerie;
	private $tipoComponente;
	private $quantidade;
	private $dataFabricante;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }   

    public function cadastrarComponente(){
    	try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("insert","
			INSERT INTO componentes (marca,fabricante,numeroSerie,tipoComponente,quantidade,dataFabricante)
			VALUES(:marca,:fabricante,:numeroSerie,:tipoComponente,:quantidade,:dataFabricante)",
			array(
				":marca"=>$this->marca,
				":fabricante"=>$this->fabricante,
				":numeroSerie"=>$this->numeroSerie,
				":tipoComponente"=>$this->tipoComponente,
				":quantidade"=>$this->quantidade,
				":dataFabricante"=>$this->dataFabricante
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
    }

    public function editarComponente($id){
		try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("update","
				UPDATE componentes SET
				marca = :marca,
				fabricante = :fabricante,
				numeroSerie = :numeroSerie,
				tipoComponente = :tipoComponente,
				quantidade = :quantidade,
				dataFabricante = :dataFabricante
				Where id = :id",
			array(
				":marca"=>$this->marca,
				":fabricante"=>$this->fabricante,
				":numeroSerie"=>$this->numeroSerie,
				":tipoComponente"=>$this->tipoComponente,
				":quantidade"=>$this->quantidade,
				":dataFabricante"=>$this->dataFabricante,
				":id"=>$id
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
    }
}

?>