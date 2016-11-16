<?php
include 'conecta_bancoAdmin.php';

class ocorrencia{

	private $numeroProtocolo;
	private $status;
	private $data;
	private $prazo;
	private $nomeMunicipe;
	private $enderecoMunicipe;
	private $descricao;
	private $contato;
	private $cpf;
	private $email;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }   

	public function cadastrarOcorrencia()
	{
		try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

			
			$dtibd->executarQuery("insert",
			"INSERT INTO ocorrencia (numeroProtocolo, status, data, prazo, nomeMunicipe, enderecoMunicipe, descricao, cpf, email) 
			VALUES (:numeroProtocolo, :status, :data, :prazo, :nomeMunicipe, :enderecoMunicipe, :descricao, :cpf, :email)",
				array(
					":numeroProtocolo"=>$this->numeroProtocolo, 
					":status"=>$this->status, 
					":data"=>$this->data, 
					":prazo"=>$this->prazo, 
					":nomeMunicipe"=>$this->nomeMunicipe, 
					":enderecoMunicipe"=>$this->enderecoMunicipe, 
					":descricao"=>$this->descricao,
					":cpf"=>$this->cpf,
					":email"=>$this->email
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
	}
}
?>