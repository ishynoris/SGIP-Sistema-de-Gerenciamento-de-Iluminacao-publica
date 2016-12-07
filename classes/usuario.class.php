<?php

include 'conecta_bancoAdmin.php';

class Usuario{

	const ADMIN = 0;
	const TECNICO = 1;
    const USUARIO = 2;
    const OPERADOR = 3;

	private $id;
	private $Usuario;
	private $Login;
	private $Pass;
	private $Admin;
	private $DataNascimento;
	private $Sexo;
	private $Email;
	private $Telefone;

    function __construct($Usuario, $Login, $Pass, $Admin,
                         $DataNascimento, $Sexo, $Email, $Telefone)
    {
        $this->id = -1;
        $this->Usuario = $Usuario;
        $this->Login = $Login;
        $this->Pass = $Pass;
        $this->Admin = $Admin;
        $this->DataNascimento = $DataNascimento;
        $this->Sexo = $Sexo;
        $this->Email = $Email;
        $this->Telefone = $Telefone;
    }

    public static function tipoUsuario($tipo)
    {
		switch($tipo){
			case 0: return "Administrador";
			case 1: return "Equipe técnica";
			case 2: return "Usuário comum";
		}
	}
	
	public function saveDB($idEndereco, $dtibd)
    {
        $this->encriptyData();

		try{

			$this->id = $dtibd->executarQuery("insert",
			"INSERT INTO usuario (usuario, login, senha, isAdmin, dataNascimento, sexo, email, telefone, id_endereco) 
			VALUES (:usuario, :login, :senha, :isAdmin, :dataNascimento, :sexo, :email, :telefone, :id_endereco)",
				array(
					":usuario"=>$this->Usuario, 
					":login"=>$this->Login,
					":senha"=>$this->Pass,
					":isAdmin"=>$this->Admin,
                    ":dataNascimento"=>$this->DataNascimento,
					":sexo"=>$this->Sexo,
					":email"=>$this->Email,
                    ":telefone"=>$this->Telefone,
                    ":id_endereco"=>$idEndereco
			));

			return $this->id;

    	} catch (PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
        return false;
	}

	private function encriptyData()
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