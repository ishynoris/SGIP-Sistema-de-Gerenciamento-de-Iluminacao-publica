<?php
include 'conecta_bancoAdmin.php';

class CaracteristicaPontoILuminacao{

    private $table = "caracteristicaspontoiluminacao";

	private $tamanhoDoPoste;
	private $tipoPoste;
	private $rele;
	private $tipoLampada;
	private $potenciaLampada;
	private $tipoLuminaria;
	private $modeloLuminaria;
	private $tamanhoBraco;
	private $tipoReator;
	private $modeloReator;
	private $potenciaReator;
    private $observacao;

    function __construct($tamanhoDoPoste, $tipoPoste, $rele, $tipoLampada, $potenciaLampada, $tipoLuminaria, 
                $modeloLuminaria, $tamanhoBraco, $tipoReator, $modeloReator, $potenciaReator, $observacao)
    {
        $this->tamanhoDoPoste = $tamanhoDoPoste;
        $this->tipoPoste = $tipoPoste;
        $this->rele = $rele;
        $this->tipoLampada = $tipoLampada;
        $this->potenciaLampada = $potenciaLampada;
        $this->tipoLuminaria = $tipoLuminaria;
        $this->modeloLuminaria = $modeloLuminaria;
        $this->tamanhoBraco = $tamanhoBraco;
        $this->tipoReator = $tipoReator;
        $this->modeloReator = $modeloReator;
        $this->potenciaReator = $potenciaReator;
        $this->observacao = $observacao;
    }

    public function saveDB($idPonto, $dtibd)
    {
        try{
			$query = "INSERT INTO caracteristicaspontoiluminacao(tamanhoDoPoste, tipoPoste, rele, tipoLampada, 
                        potenciaLampada, tipoLuminaria, modeloLuminaria, modeloBraco, tipoReator, modeloReator, 
                        potenciaDoReator, observacoes, id_ponto_iluminacao)
                      VALUES (:tamanhoDoPoste, :tipoPoste, :rele, :tipoLampada, 
                        :potenciaLampada, :tipoLuminaria, :modeloLuminaria, :tamanhoBraco, :tipoReator, :modeloReator, 
                        :potenciaReator, :observacao, :idPonto)";
			$values = array(":tamanhoDoPoste" => $this->tamanhoDoPoste,
                            ":tipoPoste" => $this->tipoPoste,
                            ":rele" => $this->rele,
                            ":tipoLampada" => $this->tipoLampada,
                            ":potenciaLampada" => $this->potenciaLampada, 
                            ":tipoLuminaria" => $this->tipoLuminaria,
                            ":modeloLuminaria" => $this->modeloLuminaria,
                            ":tamanhoBraco" => $this->tamanhoBraco,
                            ":tipoReator" => $this->tipoReator,
                            ":modeloReator" => $this->modeloReator,
                            ":potenciaReator" => $this->potenciaReator,
                            ":observacao" => $this->observacao,
                            ":idPonto" => $idPonto);
			return $dtibd->executarQuery("insert", $query, $values);

		} catch (PDOException $e){
			echo "Erro ao Inserir: " . $e->getMessage() . "\n";
        	die();
		}
    }
    public function editDB($numero, $dtibd)
    {
        try{
			$query = "UPDATE caracteristicaspontoiluminacao SET tamanhoDoPoste = :tamanhoDoPoste, 
                        tipoPoste = :tipoPoste, rele = :rele, tipoLampada = :tipoLampada, 
                        potenciaLampada = :potenciaLampada, tipoLuminaria = :tipoLuminaria, modeloLuminaria = :modeloLuminaria, 
                        modeloBraco = :tamanhoBraco, tipoReator = :tipoReator, modeloReator = :modeloReator, 
                        potenciaDoReator = :potenciaReator, observacoes = :observacao
                     WHERE caracteristicaspontoiluminacao.id_ponto_iluminacao = (
                        SELECT id FROM pontoiluminacao WHERE numeroDaPlaca = :numero)";
            $values = array(":tamanhoDoPoste" => $this->tamanhoDoPoste,
                            ":tipoPoste" => $this->tipoPoste,
                            ":rele" => $this->rele,
                            ":tipoLampada" => $this->tipoLampada,
                            ":potenciaLampada" => $this->potenciaLampada, 
                            ":tipoLuminaria" => $this->tipoLuminaria,
                            ":modeloLuminaria" => $this->modeloLuminaria,
                            ":tamanhoBraco" => $this->tamanhoBraco,
                            ":tipoReator" => $this->tipoReator,
                            ":modeloReator" => $this->modeloReator,
                            ":potenciaReator" => $this->potenciaReator,
                            ":observacao" => $this->observacao,
                            ":numero" => $numero);
            return $dtibd->executarQuery("update", $query, $values);

        } catch (PDOException $e){
			echo "Erro ao editar: " . $e->getMessage() . "\n";
        	die();
		}
    }

    public function delete($idPonto, $dtibd)
    {
        try{
            $query = "DELETE FROM $this->table WHERE id_ponto_iluminacao = :idPonto";
            $values = array(":idPonto" => $idPonto);
            return $dtibd->executarQuery("delete", $query, $values);
    
		} catch (PDOException $e){
			echo "Erro ao excluir [IdPontoIluminacao={$idPonto}]: " . $e->getMessage() . "\n";
        	die();
		}
    }
}
?>