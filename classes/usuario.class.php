<?php

include 'conecta_bancoAdmin.php';

class usuario{

	const ADMIN = 0;
	const TECNICO = 1;
	const USUARIO = 2;

	private $id;
	private $Usuario;
	private $Login;
	private $Pass;
	private $Admin;
	private $DataNascimento;
	private $Sexo;
	private $Email;
	private $Telefone;

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
  	}
	
	public static function tipoUsuario($tipo)
    {
		switch($tipo){
			case 0: return "Administrador";
			case 1: return "Equipe técnica";
			case 2: return "Usuário comum";
		}
	}
	
	public function saveDB($dtibd)
    {
        $this->prepareData();

		try{

			$this->id = $dtibd->executarQuery("insert",
			"INSERT INTO usuario (usuario, login, senha, isAdmin, dataNascimento, sexo, email, telefone) 
			VALUES (:usuario, :login, :senha, :isAdmin, :dataNascimento, :sexo, :email, :telefone)",
				array(
					":usuario"=>$this->Usuario, 
					":login"=>$this->Login,
					":senha"=>$this->Pass,
					":isAdmin"=>$this->Admin,
                    ":dataNascimento"=>$this->DataNascimento,
					":sexo"=>$this->Sexo,
					":email"=>$this->Email,
                    ":telefone"=>$this->Telefone
			));

			return $this->id;

    	} catch (PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
        return false;
	}

	private function prepareData()
    {
        $this->Usuario = addslashes($this->Usuario);
        $this->Login = md5(addslashes($this->Login));
        $this->Pass = md5(addslashes($this->Pass));
        $this->Admin = addslashes($this->Admin);
        $this->DataNascimento = addslashes($this->DataNascimento);
        $this->Sexo = addslashes($this->Sexo);
        $this->Email = addslashes($this->Email);
        $this->Telefone = md5(addslashes($this->Telefone));
    }
}