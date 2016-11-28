<?php

include 'conecta_bancoAdmin.php';

class endereco{

	const ADMIN = 0;
	const TECNICO = 1;
	const USUARIO = 2;

	private $Usuario;
	private $Login;
	private $Pass;
	private $Admin;
	private $BirthDate;
	private $Sex;
	private $Email;
	private $Phone;
	private $Cep;
	private $Street;

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }
	
	public static function tipoUsuario($tipo){
		switch($tipo){
			case 0: return "Administrador";
			case 1: return "Equipe técnica";
			case 2: return "Usuário comum";
		}
	}
}
?>