<?php
include 'classes/conecta_bancoAdmin.php';

function logarNoSistema($login, $senha){
    ob_start();

    $dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

    if (isset($_SESSION)) {
        session_destroy();
    }    

    $loginTratado = addslashes($login);
    $senhaTratado = md5(addslashes($senha));
    
    if (empty($login) OR empty($senha)) {
        echo "Login e Senha Vazios";
    }else{
        $sql = $dtibd->executarQuery("select","SELECT login, senha FROM usuario WHERE login = :login and senha = :senha limit 1",
        array(":login" => $loginTratado,":senha" => $senhaTratado));

        if (!$sql) {
            echo "Login inválido!";
        } else {
            $buscarUsuario = $dtibd->executarQuery("select","SELECT * FROM usuario WHERE login = :nome",array(":nome" => $loginTratado));
            
	    ob_start();
            session_start();

            foreach ($buscarUsuario as $resultado) {
                $_SESSION['usuario'] = $resultado['usuario'];
                $_SESSION['login'] = $resultado['login'];
                $_SESSION['isAdmin'] = $resultado['isAdmin'];
            }

            header("Location: home.php");
            exit;
        }
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