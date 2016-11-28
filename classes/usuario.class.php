<?php

include 'conecta_bancoAdmin.php';

class usuario{

	const ADMIN = 0;
	const TECNICO = 1;
	const USUARIO = 2;

	private $Usuario;
	private $Login;
	private $Pass;
	private $Admin;
	private $DataNascimento;
	private $Sexo;
	private $Email;
	private $Telefone;
	private $Endereco;
	private $EnderecoObs;

	public function __set($atrib, $value){
		if(!isset($atrib)){
			$this->$atrib = $value;
			echo $this->$atrib;
		}
  	}
	
	public static function tipoUsuario($tipo){
		switch($tipo){
			case 0: return "Administrador";
			case 1: return "Equipe técnica";
			case 2: return "Usuário comum";
		}
	}
	
	public function saveDB($dtibd){
		try{
			
			$flag = $dtibd->executarQuery("insert",
			"INSERT INTO usuario (usuario,login,senha,isAdmin) 
			VALUES (:usuario,:login,:pass,:admin)",
				array(
					":usuario"=>$this->Usuario, 
					":login"=>$this->Login, 
					":pass"=>$this->Pass, 
					":admin"=>$this->Admin
					
			));
			return $flag;
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
		return false;
	}
}
?>