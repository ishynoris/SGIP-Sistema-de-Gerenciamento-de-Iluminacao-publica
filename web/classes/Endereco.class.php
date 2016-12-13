<?php

class Endereco{
    private $id;
    private $cep;
    private $logradouro;
    private $numPredialProx;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $observacao;

    public function __construct($cep, $logradouro, $numPredialProx, $complemento, $bairro, $cidade, $uf, $observacao)
    {
        $this->id = -1;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->numPredialProx = $numPredialProx;
        $this->complemento = $complemento;
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->uf = $uf;
        $this->observacao = $observacao;
    }

    public function saveDB($dtibd){

        try{

            $this->id = $dtibd->executarQuery("insert",
                "INSERT INTO endereco (cep, logradouro, numPredialProx, complemento, bairro, cidade, uf, observacao) 
			    VALUES (:cep, :logradouro, :numPredialProx, :complemento, :bairro, :cidade, :uf, :observacao)",
                array(
                    ":cep"=>$this->cep,
                    ":logradouro"=>$this->logradouro,
                    ":numPredialProx"=>$this->numPredialProx,
                    ":complemento"=>$this->complemento,
                    ":bairro"=>$this->bairro,
                    ":cidade"=>$this->cidade,
                    ":uf"=>$this->uf,
                    ":observacao"=>$this->observacao
                ));

            return $this->id;

        } catch (PDOException $e){
            echo "Erro ao Inserir: " . $e->getMessage() . "\n";
            die();
        }
        return false;
    }
}