<?php

class Ocorrencia{

    const ABERTA = "ABERTA";
    const MANUTENCAO = "EM MANUTENÇÃO";
    const FECHADA = "FECHADA";

    const PRIO_ALTA = 0;
    const PRIO_MEDIA = 1;
    const PRIO_BAIXA = 2;

    private $id;
	private $status;
	private $data;
	private $prazo;
    private $protocolo;
    private $manutencao;
    private $prioridade;
    private $descricao;
    private $rural;
    private $foto; //-------------

    public function __construct($status, $data, $prazo, $protocolo, $manutencao, $prioridade, $descricao, $rural)
    {
        $this->id = -1;
        $this->status = $status;
        $this->data = $data;
        $this->prazo = $prazo;
        $this->protocolo = $protocolo;
        $this->manutencao = $manutencao;
        $this->prioridade = $prioridade;
        $this->descricao = $descricao;
        $this->rural = $rural;
    }

    /**
     * @return mixed
     */
    public function getProtocolo()
    {
        return $this->protocolo;
    }

    public function saveDB($idUsuario, $idEndereco, $dtibd){

        try{

            $this->id = $dtibd->executarQuery("insert",
                "INSERT INTO ocorrencia (numeroProtocolo, status, data_inicio, prazo, descricao, manutencao, rural, prioridade, id_endereco, id_usuario)
                VALUES (:numeroProtocolo, :status, :data_inicio, :prazo, :descricao, :manutencao, :rural, :prioridade, :id_endereco, :id_usuario)",
                array(
                    ":numeroProtocolo"=>$this->protocolo,
                    ":status"=>$this->status,
                    ":data_inicio"=>$this->data,
                    ":prazo"=>$this->prazo,
                    ":descricao"=>$this->descricao,
                    ":manutencao"=>$this->manutencao,
                    ":rural"=>$this->rural,
                    ":prioridade"=>$this->prioridade,
                    ":id_endereco"=>$idEndereco,
                    ":id_usuario"=>$idUsuario
                ));

            return $this->id;

        } catch (PDOException $e){
            echo "Erro ao Inserir: " . $e->getMessage() . "\n";
            die();
        }
    }
}
?>