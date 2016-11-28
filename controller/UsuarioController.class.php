<?php

include './classes/conecta_bancoAdmin.php';

class UsuarioController{
	
	function activePost($array){
		switch ($this->getPostAction($array)) {
			case 'btn-save':
				$this->extractData();
			break;

			case 'btn-back':
				header("Location: index.php");
			break;
		}
	}
	
	private function getPostAction($array){

		foreach ($array as $name) {
			if (isset($_POST[$name])) {
				return $name;
			}
		}
	}
	
	private function extractData(){
		
		$usuario = new Usuario;
		$usuario->Usuario = $_POST['nome'];
		$usuario->Login = $_POST['cpf'];
		$usuario->Pass = $_POST['conf-senha'];
		$usuario->Admin = usuario::USUARIO;
		$usuario->DataNascimento = $_POST['data-nascimento'];
		$usuario->Sexo = $_POST['sexo'];
		$usuario->Email = $_POST['email'];
		$usuario->Telefone = $_POST['telefone'];
		$usuario->EnderecoObs = $_POST['endereco-obs'];	
		$usuario->Endereco = $_POST['logradouro'] . ", " . 
				$_POST["numPredialProx"] . ". " .
				$_POST['complemento'] . ", " .
				$_POST['bairro'] . ". " . 
				$_POST['cidade'] . "/" . 
				$_POST['uf'];
	
		$dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
		echo $usuario->saveDB($dtibd);
	}
}
?>