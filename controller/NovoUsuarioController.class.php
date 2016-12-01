<?php

include './classes/conecta_bancoAdmin.php';
include 'function.php';

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

        $dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
        $login = preg_replace('/[.|-]/', "", $_POST['cpf']);
        $senha = $_POST['conf-senha'];

        $usuario = new Usuario;
        $usuario->Usuario = $_POST['nome'];
        $usuario->Login = $login;
        $usuario->Pass = $senha;
        $usuario->Admin = $_POST['tipo-usuario'];
        $usuario->Sexo = $_POST['sexo'];
        $usuario->DataNascimento = preg_replace('/\//', "", $_POST['nascimento']);
        $usuario->Email = $_POST['email'];
        $usuario->Telefone = preg_replace('[\(|\)| |-]', "",$_POST['telefone']);
        $idUsuario = $usuario->saveDB($dtibd);

        $endereco = new Endereco;
        $endereco->cep = preg_replace('/[.|-]/', "", $_POST['cep']);
        $endereco->logradouro = $_POST['logradouro'];
        $endereco->numPredialProx = $_POST["numPredialProx"];
        $endereco->complemento = $_POST['complemento'];
        $endereco->bairro = $_POST['bairro'];
        $endereco->cidade = $_POST['cidade'];
        $endereco->uf = $_POST['uf'];
        $endereco->observacao = $_POST['endereco-obs'];
        $endereco->saveDB($idUsuario, $dtibd);

        $this->autoLogin($login, $senha);
	}

	private function autoLogin($login, $senha){

        $error = logarNoSistema($login, $senha);
        var_dump($error);
        if ($error == LOGIN_SENHA_VALIDO){
            header("Location: home.php");
            exit;
        }
    }
}