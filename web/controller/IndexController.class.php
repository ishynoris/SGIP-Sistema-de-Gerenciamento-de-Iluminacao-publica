<?php

include_once './controller/Controller.class.php';
include './classes/Dtidb.class.php';

class IndexController extends Controller
{
    const BTN_SEND = "btn-enviar";
    const BTN_REGISTER = "btn-novo-cadastro";
    const BTN_RECOVER = "btn-recuperar-senha";

    const LOGIN_SENHA_NULL =  "Por favor, preencha os campos Usuario e Senha.";
    const LOGIN_SENHA_INVALIDO = "O Usuario ou Senha n達o foram validados. Por favor, verifique os dados digitados e tente novamente.";
    const LOGIN_SENHA_VALIDO = "Login ok";

    function __construct()
    {
        parent::__construct(array(IndexController::BTN_SEND, IndexController::BTN_REGISTER, IndexController::BTN_RECOVER));
    }

    public function triggerInput($input)
    {
        switch ($input){
            case IndexController::BTN_SEND:
                $login = $_POST['edtLogin'];
                $senha = $_POST['edtSenha'];
                return IndexController::doLogin($login, $senha);
            case IndexController::BTN_REGISTER: return $this->newRegister();
            case IndexController::BTN_RECOVER: return $this->recoverPassword();
        }
    }

    public static function isAdministrador($isAdmin)
    {
        return $isAdmin == 0;
    }

    public static function iniciarlizate(){
        session_start();
        ob_start();
        verificarLogin();
    }

    public static function doLogin($login, $senha)
    {
        if (empty($login) OR empty($senha)){

            return IndexController::LOGIN_SENHA_NULL;

        } else {

            $login = md5(addslashes($login));
            $senha = md5(addslashes($senha));
            $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

            $getUser = $dtibd->executarQuery("select",
                "SELECT id, usuario, isAdmin FROM usuario 
                WHERE login = :login and senha = :senha limit 1",
                array(":login" => $login,":senha" => $senha));

            if(!$getUser){
                return IndexController::LOGIN_SENHA_INVALIDO;
            } else {

                session_start();

                foreach ($getUser as $user) {
                    $_SESSION['id'] = $user['id'];
                    $_SESSION['usuario'] = $user['usuario'];
                    $_SESSION['isAdmin'] = $user['isAdmin'];
                }
                return IndexController::LOGIN_SENHA_VALIDO;
            }
        }
    }

    private function newRegister()
    {
        header("Location: novo-cadastro.php");
        exit;
    }

    private function recoverPassword(){
        header("Location: recuperar-senha.php");
        exit;
    }
}