<?php

require './controller/Controller.class.php';
include './classes/Endereco.class.php';
include './classes/PontoIluminacao.class.php';
include './classes/CaracteristicaPontoILuminacao.class.php';
include './classes/PontoMapa.class.php';

class PontoIluminacaoController extends Controller
{
    const BTN_SAVE = "btn-save";
    const BTN_EDIT = "btn-edit";
    const BTN_BACK = "btn-back";

    function __construct()
    {
        parent::__construct(array(PontoIluminacaoController::BTN_SAVE, PontoIluminacaoController::BTN_EDIT,
                    PontoIluminacaoController::BTN_BACK));
    }

    public function triggerInput($input)
    {
        switch($input){
            case PontoIluminacaoController::BTN_SAVE: $this->save(); break;
            case PontoIluminacaoController::BTN_EDIT: $this->edit(); break;
            case PontoIluminacaoController::BTN_BACK: $this->back(); break;
        }
    }

    private function save()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        
        $logradouro = $_POST['logradouro'];
        $numero = $_POST["numPredialProx"];
        $bairro = $_POST["bairro"];
        $cidade = $_POST["cidade"];
        $uf = $_POST["uf"];

        $endereco = new Endereco($_POST['cep'], $logradouro, $numero, $_POST['complemento'],
                    $bairro, $cidade, $uf, $_POST['obs-end']);
        $idEndereco = $endereco->saveDB($dtibd);

        $conservacao = $this->getValueStatus($_POST['conservacao']);
        $pontoIluminacao = new PontoIluminacao($conservacao, $_POST['numero']);
        $idPonto = $pontoIluminacao->saveDB($idEndereco, $dtibd);

        $caracteristica = new CaracteristicaPontoILuminacao($_POST['tamanho'], $_POST['t-poste'], $_POST['rele'], 
                $_POST['t-lampada'], $_POST['p-lampada'], $_POST['t-luminaria'], 
                $_POST['m-luminaria'], $_POST['tam-braco'], $_POST['t-reator'], $_POST['m-reator'], $_POST['p-reator'], 
                $_POST['obs-ponto']);
        $caracteristica->saveDB($idPonto, $dtibd);

        $address = $logradouro .' '. $numero .', '. $bairro .'. '. $cidade .' - '. $uf;
        $pontoMapa = new PontoMapa($address);
        $pontoMapa->saveDB($idPonto, $dtibd);
    }

    public function edit()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        
        $numero =  $_POST['numero'];

        $conservacao = $this->getValueStatus($_POST['conservacao']);
        $pontoIluminacao = new PontoIluminacao($conservacao, $numero);
        $pontoIluminacao->editDB($dtibd);

        $caracteristica = new CaracteristicaPontoILuminacao($_POST['tamanho'], $_POST['t-poste'], $_POST['rele'], 
                $_POST['t-lampada'], $_POST['p-lampada'], $_POST['t-luminaria'], 
                $_POST['m-luminaria'], $_POST['tam-braco'], $_POST['t-reator'], $_POST['m-reator'], $_POST['p-reator'], 
                $_POST['obs-ponto']);
        $flag = $caracteristica->editDB($numero, $dtibd);

        if($flag){
            echo "<script>alert('As alterações foram salvas corretamente.');</script>";
        } else {
            echo "<script>alert('Ocorreu algum erro ao salvar os dados. 
                \nPor favor, tente novamente mais tarde ou entre em contato com o suporte.');</script>";
        }
        echo "<script>window.location.assign('./pontos-iluminacao.php');</script>";
    }

    public function delete($placa, $conservacao)
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        
        $pontoIluminacao = new PontoIluminacao($conservacao, $placa);
        $ids = $pontoIluminacao->getIds($dtibd);
        $details = $this->getDetails($placa, $_SESSION['id']);
       
        $endereco = new Endereco($details[0]['cep'], $details[0]['logradouro'], $details[0]['numPredialProx'], 
                    $details[0]['complemento'], $details[0]['bairro'], $details[0]['cidade'], $details[0]['uf'], 
                    $details[0]['observacao']);
                
        $caracteristica = new CaracteristicaPontoILuminacao($details[0]['tamanhoDoPoste'], $details[0]['tipoPoste'], 
                    $details[0]['rele'], $details[0]['tipoLampada'], $details[0]['potenciaLampada'], $details[0]['tipoLuminaria'], 
                    $details[0]['modeloLuminaria'], $details[0]['modeloBraco'], $details[0]['tipoReator'], 
                    $details[0]['modeloReator'], $details[0]['potenciaDoReator'], $details[0]['observacoes']);
        
        $pontoMapa = new PontoMapa($details[0]['logradouro'] .' '. $details[0]['numPredialProx'] .' '. $details[0]['bairro'] .' '. 
                    $details[0]['cidade'] .' - '. $details[0]['uf']);

        echo 'Endereco: '. $endereco->delete($ids[0]['id_endereco'], $dtibd) .'<br>';
        echo 'Características: '. $caracteristica->delete($ids[0]['id'], $dtibd) .'<br>';
        echo 'Ponto no mapa: '. $pontoMapa->delete($ids[0]['id'], $dtibd) .'<br>';
        echo 'Ponto de iluminacao: '. $pontoIluminacao->delete($placa, $dtibd) .'<br>';
    }

    public function back()
    {
        header("Location: pontos-iluminacao.php");
        exit;
    }

    public function getDetails($placa, $uid)
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT pi.statusConservacao, pi.numeroDaPlaca, cpi.tamanhoDoPoste, cpi.rele, cpi.tipoReator, 
                        cpi.potenciaDoReator, cpi.modeloBraco, cpi.modeloLuminaria, cpi.tipoLuminaria, cpi.tipoLampada, 
                        cpi.potenciaLampada, cpi.tipoPoste, cpi.modeloReator, cpi.observacoes, 
                        e.cep, e.logradouro, e.numPredialProx, e.bairro, e.cidade, e.uf, e.complemento, e.observacao
                    FROM pontoiluminacao AS pi
                    INNER JOIN caracteristicaspontoiluminacao AS cpi 
                    INNER JOIN endereco AS e
                    INNER JOIN usuario AS u
                    WHERE e.id = pi.id_endereco 
                        AND pi.id  = cpi.id_ponto_iluminacao
                        AND pi.numeroDaPlaca = :placa
                        AND u.id = :uid
                    LIMIT 1";
        $values = array(":placa" => $placa, ":uid" => $uid);
        return $dtibd->executarQuery("select", $query, $values);
    }

    public function getAll()
    {
        $dtibd = new Dtidb(Dtidb::HOST, Dtidb::DB_NAME, Dtidb::USER_NAME, Dtidb::PASSWORD);
        $query = "SELECT pi.numeroDaPlaca, pi.statusConservacao, 
                        e.logradouro, e.numPredialProx, e.bairro, e.cidade, e.uf 
                    FROM pontoiluminacao AS pi 
                    INNER JOIN endereco AS e
                    WHERE e.id = pi.id_endereco";
        return $dtibd->executarQuery("select", $query);
    }

	public function getStatus($value)
	{
		switch($value){
            
			case PontoIluminacao::V_BOM: return PontoIluminacao::S_BOM;
			case PontoIluminacao::V_RAZOAVEL: return PontoIluminacao::S_RAZOAVEL; 
			case PontoIluminacao::V_RUIM: return PontoIluminacao::S_RUIM; 
		}
	}

	public function getValueStatus($status)
	{
		switch($status){
			case PontoIluminacao::S_BOM: return PontoIluminacao::V_BOM;
			case PontoIluminacao::S_RAZOAVEL: return PontoIluminacao::V_RAZOAVEL; 
			case PontoIluminacao::S_RUIM: return PontoIluminacao::V_RUIM;
		}
	}
}