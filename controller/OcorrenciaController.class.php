<?php

include './classes/conecta_bancoAdmin.php';

class OcorrenciaController{
	
	private $protocol;
	
	public function __set($atrib, $value){
		$this->$atrib = $value;
	}

	public function __get($atrib){
		return $this->$atrib;
	} 
	
	public function extractData(){
		
		$endereco = $_POST["logradouro"] . ", " . 
				$_POST["numPredialProx"] . ". " .
				$_POST['complemento'] . ", " .
				$_POST['bairro'] . ". " . 
				$_POST['cidade'] . "/" . 
				$_POST['uf'];
				
		$ocorrencia = new ocorrencia;
		
		$ocorrencia->numeroProtocolo = $this->protocol;
		$ocorrencia->status = "Aberta"; 
		$ocorrencia->data = date('d/m/Y'); 
		$ocorrencia->prazo = date('d/m/Y', strtotime(' + 5 days')); 
		$ocorrencia->nomeMunicipe = $_SESSION['usuario'];
		$ocorrencia->contato = $_POST['contato'];
		$ocorrencia->enderecoMunicipe = $endereco;
		$ocorrencia->descricao = $_POST['descricao'];
		$ocorrencia->cpf = $_POST['cpf'];
		$ocorrencia->email = $_POST['email'];
		
		$flag = $this->save($ocorrencia);
		
		if($flag){
			
			echo "<script type='text/javascript'> 
				alert('Seu Atendimento foi Registrado com Sucesso. Seu numero de Protocolo é $ocorrencia->numeroProtocolo');
				</script>";
		}
	}
	
	private function save($ocorrencia){
		
		try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
			
			$dtibd->executarQuery("insert",
				"INSERT INTO ocorrencia (numeroProtocolo, status, data, prazo, nomeMunicipe, enderecoMunicipe, descricao, cpf, email) 
				VALUES (:numeroProtocolo, :status, :data, :prazo, :nomeMunicipe, :enderecoMunicipe, :descricao, :cpf, :email)",
				array(
					":numeroProtocolo"=>$ocorrencia->numeroProtocolo, 
					":status"=>$ocorrencia->status, 
					":data"=>$ocorrencia->data, 
					":prazo"=>$ocorrencia->prazo, 
					":nomeMunicipe"=>$ocorrencia->nomeMunicipe, 
					":enderecoMunicipe"=>$ocorrencia->enderecoMunicipe, 
					":descricao"=>$ocorrencia->descricao,
					":cpf"=>$ocorrencia->cpf,
					":email"=>$ocorrencia->email
				)
			);
			return true;
			
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
		}
		return false;
	}
}
?>