<?php

include './controller/Controller.class.php';
include './classes/Endereco.class.php';
include './classes/Ocorrencia.class.php';

class NovaOcorrenciaController extends Controller{
	
	private $protocolo;

	public function __construct($protocolo)
    {
        $this->protocolo = $protocolo;
    }

    public function saveData(){

        $dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");

        $endereco = new Endereco($_POST['cep'], $_POST['logradouro'], $_POST["numPredialProx"], $_POST['complemento'],
                    $_POST['bairro'], $_POST['cidade'], $_POST['uf'], $_POST['observacao']);
        $idEndereco = $endereco->saveDB($dtibd);

        $rural = ($_POST['rural'] == "SIM");
        $ocorrencia = new Ocorrencia(Ocorrencia::ABERTA, date('d/m/Y'), date('d/m/Y', strtotime(' + 5 days')), $this->protocolo,
                    $_POST['manutencao'], Ocorrencia::PRIO_MEDIA, $_POST['descricao'], $rural);
		$flag = $ocorrencia->saveDB($_SESSION['id'], $idEndereco, $dtibd);

		if($flag){

            echo "<script type='text/javascript'> 
				alert('Seu Atendimento foi Registrado com Sucesso. Seu numero de Protocolo é $ocorrencia->getProtocolo()');
				</script>";
		} else {

            echo "<script type='text/javascript'> 
				alert('Ocorreu um erro ao cadastrar sua ocorrência. Se o erro persistir, por favor tente mais tarde');
				</script>";
        }
        header("Location: home.php");
	}


    public function getAll(){

        $dtibd = new DTIDb("localhost", "viare024_sip", "viare024_sip", "iwd5QplD?$(9");
        $buscarOcorrencia = $dtibd->executarQuery("select",
            "SELECT o.numeroProtocolo, o.status, o.data_inicio, o.prazo, u.usuario, e.logradouro, 
                    e.numPredialProx, e.bairro, e.cidade, e.uf 
            FROM ocorrencia as o 
            INNER JOIN usuario as u on u.id = o.id_usuario 
            INNER JOIN endereco as e on e.id = o.id_endereco");

        return $buscarOcorrencia;
    }
}
?>