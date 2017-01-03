<?php

require './controller/Controller.class.php';
include './classes/Endereco.class.php';
include './classes/Ocorrencia.class.php';

class OcorrenciaController extends Controller
{

    const OCORRENCIA = "ocorrencia";
    const BTN_SAVE = "btn-save";
    const BTN_SEARCH = "btn-search";
    const PROTOCOL = "protocol";

    function __construct()
    {
        parent::__construct(array(OcorrenciaController::BTN_SAVE, OcorrenciaController::BTN_SEARCH));
    }

    public function triggerInput($actionPost)
    {
        switch ($actionPost) {

            case OcorrenciaController::BTN_SAVE: return $this->saveData();
            case OcorrenciaController::BTN_SEARCH:
                $protocolo = $_POST[OcorrenciaController::PROTOCOL];
                return $this->getByProtocol($protocolo);
        }
    }

    private function saveData()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

        $endereco = new Endereco($_POST['cep'], $_POST['logradouro'], $_POST["numPredialProx"], $_POST['complemento'],
                    $_POST['bairro'], $_POST['cidade'], $_POST['uf'], $_POST['observacao']);
        $idEndereco = $endereco->saveDB($dtibd);

        $prioridade = OcorrenciaController::getPriority();
        $prazo = preg_replace('/\//', "", OcorrenciaController::getDeadLine());
        $inicio = preg_replace('/\//', "", date('d/m/Y'));
        $rural = $this->isRural();

        $ocorrencia = new Ocorrencia(Ocorrencia::ABERTA, $inicio, $prazo, $_POST['protocolo'],
                    $_POST['manutencao'], $prioridade, $_POST['descricao'], $rural);
        $idOcorrencia = $ocorrencia->saveDB($_SESSION['id'], $idEndereco, $dtibd);

        if ($idOcorrencia) {

            echo "<script type='text/javascript'> 
				alert('Seu Atendimento foi Registrado com Sucesso. Seu numero de Protocolo é');
				</script>";

            header("Location: home.php");
        } else {

            echo "<script type='text/javascript'> 
				alert('Ocorreu um erro ao cadastrar sua ocorrência. Se o erro persistir, por favor tente mais tarde');
				</script>";
        }
    }

    public function getAll()
    {
        $dtibd = new Dtidb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
        $query = "SELECT o.protocolo, o.status, o.data_inicio, o.prazo, u.usuario, e.logradouro, 
                    e.numPredialProx, e.bairro, e.cidade, e.uf 
            FROM ocorrencia as o 
            INNER JOIN usuario as u on u.id = o.id_usuario 
            INNER JOIN endereco as e on e.id = o.id_endereco";
        return $dtibd->executarQuery("select", $query);
    }

    public function getByProtocol($protocolo)
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT u.usuario,
                o.protocolo, o.manutencao, o.status, o.data_inicio, o.prazo, o.descricao, 
                e.cep, e.logradouro, e.numPredialProx, e.complemento, e.bairro, e.cidade, e.uf, 
                e.observacao
                FROM ocorrencia as o 
                INNER JOIN usuario as u on u.id = o.id_usuario 
                INNER JOIN endereco as e on e.id = o.id_endereco
                WHERE o.protocolo = :protocolo LIMIT 1";
        return $dtibd->executarQuery("select", $query, array(":protocolo" => $protocolo));
    }

    public static function getByUserId($id)
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT protocolo, status, descricao, manutencao, prioridade FROM ocorrencia WHERE id_usuario = :id";
        return $dtibd->executarQuery("select", $query, array(":id" => $id));
    }

    public static function getAllOpen()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT protocolo, status, descricao, manutencao, prioridade FROM ocorrencia ";
        return $dtibd->executarQuery("select", $query);
    }

    public static function getDetails($protocol, $uid)
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT u.usuario,
                o.protocolo, o.manutencao, o.status, o.data_inicio, o.prazo, o.descricao, 
                e.cep, e.logradouro, e.numPredialProx, e.complemento, e.bairro, e.cidade, e.uf, 
                e.observacao
                FROM ocorrencia as o 
                INNER JOIN usuario as u on u.id = o.id_usuario 
                INNER JOIN endereco as e on e.id = o.id_endereco
                WHERE o.protocolo = :protocol and u.id = :uid LIMIT 1";
        return $dtibd->executarQuery("select", $query, array(":protocol" => $protocol, ":uid" => $uid));
    }

    public static function delete($protocol, $uid){

        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);

        $query = "SELECT id_endereco FROM ocorrencia WHERE protocolo = :protocol";
        $idEndereco = $dtibd->executarQuery("select", $query, array(":protocol"=>$protocol));

            $query = "DELETE from endereco WHERE id = :idEndereco";
        $dtibd->executarQuery("delete", $query, array(":idEndereco" => $idEndereco));

        $query = "DELETE FROM ocorrencia WHERE protocolo = :protocol and id_usuario = :uid";
        return $dtibd->executarQuery("delete", $query, array(":protocol" => $protocol, ":uid" => $uid));
    }

    private function isRural(){
        return $_POST['rural'] == "SIM";
    }

    public static function getPriority(){
        switch ($_POST['prioridade']){
            case Ocorrencia::PRIO_ALTA: return Ocorrencia::V_PRIO_ALTA;
            case Ocorrencia::PRIO_MEDIA: return Ocorrencia::V_PRIO_MEDIA;
            case Ocorrencia::PRIO_BAIXA: return Ocorrencia::V_PRIO_BAIXA;
            case Ocorrencia::PRIO_ARASADO: return Ocorrencia::V_PRIO_ATRASADA;
        }
    }

    public static function getDeadLine(){
        switch ($_POST['prioridade']){
            case Ocorrencia::PRIO_ALTA: return date('d/m/Y', strtotime(' + 2 days'));
            case Ocorrencia::PRIO_MEDIA: return date('d/m/Y', strtotime(' + 5 days'));
            case Ocorrencia::PRIO_BAIXA: return date('d/m/Y', strtotime(' + 7 days'));
        }
    }

    public static function getStatus($value){
        switch ($value){
            case 0: return date('d/m/Y', strtotime(' + 2 days'));
            case 1: return date('d/m/Y', strtotime(' + 5 days'));
            case 2: return date('d/m/Y', strtotime(' + 7 days'));
            case 3: return date('d/m/Y', strtotime(' + 7 days'));
        }
    }
}

?>