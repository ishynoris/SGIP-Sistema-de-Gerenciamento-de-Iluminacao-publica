<?php
include 'conecta_bancoAdmin.php';

class pontoiluminacao{


	private $bairro;
	private $logradouro;
	private $numPredialProx;
	private $statusConservacao;
	private $numeroDaPlaca;

	private $tamanhoDoPoste;
	private $refrator;
	private $tipoReator;
	private $potenciaDoReator;
	private $modeloBraco;
	private $modeloLuminaria;
	private $potenciaLuminaria;
	private $tipoLampada;
	private $potenciaLampada;

	private $tipoPoste;
	private $modeloReator;
	private $imagem;
	private $observacoes;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }   

    public function pontosmapa($lat,$lng,$type)
    {
    	try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("insert","INSERT INTO pontosmapa(name,address,lat,lng,type) 
								VALUES(:name,:address,:lat,:lng,:type)",
				array(
					":name"=>$this->logradouro,
					":address"=>$this->logradouro,
					":lat"=>$lat,
					":lng"=>$lng,
					"type"=>$type
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
    }

    public function salvarCaracteristicasPontoIluminacao($id)
    {
    	try{
	    	$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

	    	$dtibd->executarQuery("insert",
			"INSERT INTO caracteristicaspontoiluminacao (tamanhoDoPoste,refrator,tipoReator,potenciaDoReator,
			modeloBraco,modeloLuminaria,potenciaLuminaria,tipoLampada,potenciaLampada,tipoPoste,modeloReator,imagem,observacoes,idPontoIluminacao) 
			VALUES (:tamanhoDoPoste,:refrator,:tipoReator,:potenciaDoReator,:modeloBraco,
			:modeloLuminaria,:potenciaLuminaria,:tipoLampada,:potenciaLampada,:tipoPoste,:modeloReator,:imagem, :observacoes, :idPontoIluminacao)",

			array(
				":tamanhoDoPoste" => $this->tamanhoDoPoste,
				":refrator" => $this->refrator,
				":tipoReator" => $this->tipoReator,
				":potenciaDoReator" => $this->potenciaDoReator,
				":modeloBraco" => $this->modeloBraco,
				":modeloLuminaria" => $this->modeloLuminaria,
				":potenciaLuminaria" => $this->potenciaLuminaria,
				":tipoLampada" => $this->tipoLampada,
				":potenciaLampada" => $this->potenciaLampada,
				":tipoPoste" => $this->tipoPoste,
				":modeloReator" => $this->modeloReator,
				":imagem" => $this->imagem,
				":observacoes" => $this->observacoes,
				":idPontoIluminacao" => $id				
			));
		}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
    }

	public function salvarPontoIluminacao()
	{
		try{
			$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
						
			$lastInsertId = $dtibd->executarQuery("insert",
			"INSERT INTO pontoiluminacao(logradouro,statusConservacao,numeroDaPlaca)
			 VALUES (:logradouro,:statusConservacao,:numeroDaPlaca)",

			array(
				":logradouro" => $this->logradouro,
				":statusConservacao" => $this->statusConservacao,
				":numeroDaPlaca" => $this->numeroDaPlaca
				
			));

			return $lastInsertId;

		}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
	}

	public function editarPI($id)
	{
		try{
			$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

			$lastInsertId = $dtibd->executarQuery("update",
			"UPDATE caracteristicaspontoiluminacao SET
				tamanhoDoPoste = :tamanhoDoPoste,
				refrator = :refrator,
				tipoPoste = :tipoPoste,
				modeloReator = :modeloReator,
				tipoReator = :tipoReator,
				potenciaDoReator = :potenciaDoReator,
				modeloBraco = :modeloBraco,
				modeloLuminaria = :modeloLuminaria,
				potenciaLuminaria = :potenciaLuminaria,
				tipoLampada = :tipoLampada,
				potenciaLampada = :potenciaLampada WHERE idPontoIluminacao = $id",
			array(
				":tamanhoDoPoste" => $this->tamanhoDoPoste,
				":refrator" => $this->refrator,
				":tipoPoste" => $this->tipoPoste,
				":modeloReator" => $this->modeloReator,
				":tipoReator" => $this->tipoReator,
				":potenciaDoReator" => $this->potenciaDoReator,
				":modeloBraco" => $this->modeloBraco,
				":modeloLuminaria" => $this->modeloLuminaria,
				":potenciaLuminaria" => $this->potenciaLuminaria,
				":tipoLampada" => $this->tipoLampada,
				":potenciaLampada" => $this->potenciaLampada
			));
		}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
	}
}
?>