<?php
include 'classes/conecta_bancoAdmin.php';

define("LOGIN_SENHA_NULL",  "Por favor, preencha os campos Usuario e Senha.");
define("LOGIN_SENHA_INVALIDO", "O Usuario ou Senha não foram validados. Por favor, verifique os dados digitados e tente novamente.");
define("LOGIN_SENHA_VALIDO", "Login ok");

function logarNoSistema($login, $senha){
    ob_start();

    $dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

    if (isset($_SESSION)) {
        session_destroy();
    }    

    $loginTratado = addslashes($login);
    $senhaTratado = md5(addslashes($senha));
    
    if (empty($login) OR empty($senha)) {
        return LOGIN_SENHA_NULL;
    }else{
        $sql = $dtibd->executarQuery("select","SELECT login, senha FROM usuario WHERE login = :login and senha = :senha limit 1",
        array(":login" => $loginTratado,":senha" => $senhaTratado));

        if (!$sql) {
            return LOGIN_SENHA_INVALIDO;
        } else {
            $buscarUsuario = $dtibd->executarQuery("select","SELECT * FROM usuario WHERE login = :nome",array(":nome" => $loginTratado));
            
	    ob_start();
            session_start();

            foreach ($buscarUsuario as $resultado) {
                $_SESSION['usuario'] = $resultado['usuario'];
                $_SESSION['login'] = $resultado['login'];
                $_SESSION['isAdmin'] = $resultado['isAdmin'];
            }

			return LOGIN_SENHA_VALIDO;
        }
    }  
}

function validateAcess(){
	if(!isset($_SESSION)){
		header("Location: home.php");
	}
}

function isAdministrador($isAdmin){
    if($isAdmin == 0){
        return true;
    }else{
        return false;
    }
}

function iniciarlizate(){    
    session_start();
    ob_start();
    verificarLogin();
}

function isEquipeTecnica(){

}

?>