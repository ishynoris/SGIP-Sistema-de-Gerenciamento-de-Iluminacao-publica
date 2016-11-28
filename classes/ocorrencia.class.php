<?php

require('./inc/Config.inc.php');

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
	private $ocorrenciaDAO;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    } 
}
?>