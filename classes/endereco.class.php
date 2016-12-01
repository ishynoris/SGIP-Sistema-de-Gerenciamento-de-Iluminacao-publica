<?php

class endereco{
    private $id;
    private $cep;
    private $logradouro;
    private $numPredialProx;
    private $complemento;
    private $bairro;
    private $cidade;
    private $uf;
    private $observacao;

    public function __set($atrib, $value){

        $this->$atrib = $value;
    }

    public function saveDB($idUsuario, $dtibd){

        try{

            $this->id = $dtibd->executarQuery("insert",
                "INSERT INTO endereco (cep, logradouro, numPredialProx, complemento, bairro, cidade, uf, observacao, usuario_id) 
			    VALUES (:cep, :logradouro, :numPredialProx, :complemento, :bairro, :cidade, :uf, :observacao, :usuario_id)",
                array(
                    ":cep"=>$this->cep,
                    ":logradouro"=>$this->logradouro,
                    ":numPredialProx"=>$this->numPredialProx,
                    ":complemento"=>$this->complemento,
                    ":bairro"=>$this->bairro,
                    ":cidade"=>$this->cidade,
                    ":uf"=>$this->uf,
                    ":observacao"=>$this->observacao,
                    ":usuario_id"=>$idUsuario
                ));

            return $this->id;

        } catch (PDOException $e){
            echo "Erro ao Inserir: " . $e->getMessage() . "\n";
            die();
        }
        return false;
    }
}