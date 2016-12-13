<?php

include 'conecta_bancoAdmin.php';

class manutencao{
	
	private $localdePartida;
	private $nomeSolicitante;
	private $contato;
	private $email;
	private $tipoServico;
	private $prioridade;
	private $observacoes;
	private $localdeDestino;
	private $ocorrencia;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }   

    public function inserirManutencao(){
    	try{
    		$dtibd = new Dtidb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("insert",
			"INSERT INTO manutencao (localdePartida,nomeSolicitante, contato, email, tipoServico, prioridade, observacoes, localdeDestino,ocorrencia)
			 VALUES (:localdePartida,:nomeSolicitante, :contato, :email, :tipoServico, :prioridade, :observacoes, :localdeDestino,:ocorrencia)",
			array(
					":localdePartida"=>$this->localdePartida,
					":nomeSolicitante"=>$this->nomeSolicitante,
					":contato"=>$this->contato,
					":email"=>$this->email,
					":tipoServico"=>$this->tipoServico,
					":prioridade"=>$this->prioridade,
					":observacoes"=>$this->observacoes,
					":localdeDestino"=>$this->localdeDestino,
					":ocorrencia"=>$this->ocorrencia
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}    	
    }

    public function atualizarOcorrencia($num){
    	try{
    		$dtibd = new Dtidb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("update",
			"UPDATE ocorrencia SET status = :status WHERE numeroProtocolo = :ocorrencia",
			array(
					":status" => "Em Manutenção",
					":ocorrencia" =>  $num
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}    
    }
}

?>