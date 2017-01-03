<?php

class Ocorrencia{

    const ABERTA = "ABERTA";
    const MANUTENCAO = "EM MANUTENÇÃO";
    const FECHADA = "FECHADA";
    const ATRASADA = "ATRASADA";

    const PRIO_ALTA = "ALTA";
    const PRIO_MEDIA = "MÉDIA";
    const PRIO_BAIXA = "BAIXA";

    const V_PRIO_ALTA = 0;
    const V_PRIO_MEDIA = 1;
    const V_PRIO_BAIXA = 2;
    const V_PRIO_ATRASADA = 3;

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

    public function getProtocolo()
    {
        return $this->protocolo;
    }

    public function saveDB($idUsuario, $idEndereco, $dtibd){

        try{

            $this->id = $dtibd->executarQuery("insert",
                "INSERT INTO ocorrencia (status, data_inicio, prazo, protocolo, manutencao, prioridade, rural, descricao, id_endereco, id_usuario)
                VALUES (:status, :data_inicio, :prazo, :protocolo, :manutencao, :prioridade, :rural, :descricao, :id_endereco, :id_usuario)",
                array(
                    ":status"=> $this->status,
                    ":data_inicio"=> $this->data,
                    ":prazo"=> $this->prazo,
                    ":protocolo"=> $this->protocolo,
                    ":manutencao" => $this->manutencao,
                    ":prioridade" => $this->prioridade,
                    ":rural" => $this->rural,
                    ":descricao" => $this->descricao,
                    ":id_endereco" => $idEndereco,
                    ":id_usuario" => $idUsuario
                ));

            return $this->id;

        } catch (PDOException $e){
            echo "Erro ao Inserir: " . $e->getMessage() . "\n";
            die();
        }
    }
}
?>