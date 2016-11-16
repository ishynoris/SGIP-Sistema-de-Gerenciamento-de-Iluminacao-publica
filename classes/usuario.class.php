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

	public function __set($atrib, $value){
      	$this->$atrib = $value;
  	}

    public function __get($atrib){
        return $this->$atrib;
    }   

	public function cadastrarUsuario()
	{
		try{
    		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

			
			$dtibd->executarQuery("insert",
			"INSERT INTO usuario (usuario,login,senha,isAdmin) 
			VALUES (:usuario,:login,:pass,:admin)",
				array(
					":usuario"=>$this->Usuario, 
					":login"=>$this->Login, 
					":pass"=>$this->Pass, 
					":admin"=>$this->Admin
					
			));
    	}catch(PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
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