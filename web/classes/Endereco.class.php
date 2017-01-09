<?php

class Endereco{

    private $table = "endereco";

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

            $id = $dtibd->executarQuery("insert",
                "INSERT INTO $this->table (cep, logradouro, numPredialProx, complemento, bairro, cidade, uf, observacao) 
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

            return $id;

        } catch (PDOException $e){
            echo "Erro ao Inserir: " . $e->getMessage() . "\n";
            die();
        }
        return false;
    }

    public function delete($id, $dtibd)
    {
        try{
            $query = "DELETE FROM endereco WHERE id = :id";
            $values = array(":id" => $id);
            return $dtibd->executarQuery("delete", $query, $values);

		} catch (PDOException $e){
			echo "Erro ao excluir [logradouro={$this->logradouro}, numero={$this->numPredialProx}, bairro={$this->bairro}]: " . $e->getMessage() . "\n";
        	die();
		}
    }
}