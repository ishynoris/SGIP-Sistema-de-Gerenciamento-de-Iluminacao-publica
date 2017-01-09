<?php
include 'conecta_bancoAdmin.php';

class Pontoiluminacao{

	private $table = "pontoiluminacao";

	const S_BOM = "BOM";
	const S_RAZOAVEL = "RAZOÁVEL";
	const S_RUIM = "RUIM";

	const V_BOM = 0;
	const V_RAZOAVEL = 1;
	const V_RUIM = 2;

	private $conservacao; //
	private $numero;//
	private $imagem;//

	public function __construct($conservacao, $numero)
	{
		$this->conservacao = $conservacao;
		$this->numero = $numero;
	}

	public function saveDB($idEndereco, $dtibd)
	{
		try{
			$query = "INSERT INTO $this->table (statusConservacao, numeroDaPlaca, id_endereco)
						VALUES (:conservacao, :numero, :idEndereco)";
			$values = array(":conservacao" => (int) $this->conservacao,
							":numero" => $this->numero,
							":idEndereco" => $idEndereco);
			return $dtibd->executarQuery("insert", $query, $values);

		} catch (PDOException $e){
			echo "Erro ao Inserir: [placa={$this->numero}, endereco={$idEndereco}] " . $e->getMessage() . "\n";
        	die();
		}
	}

	public function editDB($dtibd)
	{
		try{
			$query = "UPDATE $this->table SET statusConservacao = :statusConservacao
					WHERE numeroDaPlaca = :numeroDaPlaca";
			$values = array(":statusConservacao" => (int) $this->conservacao, 
							":numeroDaPlaca" => $this->numero);
			$dtibd->executarQuery("update", $query, $values);

		} catch (PDOException $e){
			echo "Erro ao editar [placa={$this->numero}]: " . $e->getMessage() . "\n";
        	die();
		}
	}

	public function delete($placa, $dtibd)
	{	
		try{
			$query = "DELETE FROM $this->table WHERE numeroDaPlaca = :placa";
			$values = array(":placa" => (int) $placa);
			return $dtibd->executarQuery("delete", $query, $values);
		} catch (PDOException $e){
			echo "Erro ao excluir [placa={$placa}]: " . $e->getMessage() . "\n";
        	die();
		}
	}

	public function getIds($dtibd)
	{
		$query = "SELECT id, id_endereco FROM $this->table WHERE numeroDaPlaca = :numero";
		$values = array(":numero" => $this->numero);
		return $dtibd->executarQuery("select", $query, $values);
	}
}
?>