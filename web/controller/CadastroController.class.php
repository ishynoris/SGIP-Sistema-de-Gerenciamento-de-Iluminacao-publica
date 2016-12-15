<?php

include_once './controller/Controller.class.php';
include './controller/IndexController.class.php';

class CadastroController extends Controller {

    const BTN_SAVE = "btn-save";
    const BTN_BACK = "btn-back";

    function __construct()
    {
        parent::__construct(array(CadastroController::BTN_SAVE, CadastroController::BTN_BACK));
    }

    public function triggerInput($array)
    {
        switch ($array) {
            case CadastroController::BTN_SAVE:
                return $this->saveData();
                break;
            case CadastroController::BTN_BACK:
                header("Location: index.php");
                exit;
                break;
        }
    }

    public function saveData()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

        $cep = preg_replace('/[.|-]/', "", $_POST['cep']);
        $endereco = new Endereco($cep, $_POST['logradouro'], $_POST["numPredialProx"], $_POST['complemento'],
            $_POST['bairro'], $_POST['cidade'], $_POST['uf'], $_POST['endereco-obs']);

        $idEndereco = $endereco->saveDB($dtibd);

        $login = preg_replace('/[.|-]/', "", $_POST['cpf']);
        $senha = $_POST['conf-senha'];
        $dataNascimento = preg_replace('/\//', "", $_POST['nascimento']);
        $telefone = preg_replace('[\(|\)| |-]', "",$_POST['telefone']);

        $usuario = new Usuario($_POST['nome'], $login, $senha, $_POST['tipo-usuario'], $dataNascimento, $_POST['sexo'],
            $_POST['email'], $telefone);
        $usuario->saveDB($idEndereco, $dtibd);

        return IndexController::doLogin($login, $senha);
    }
}
?>