<?php 
	include 'header.php';
?>

<div class="row">

<?php 

include 'menu.php';
if ($_SESSION['isAdmin'] == Usuario::USUARIO) {

?>

<div class="col-sm-9"> 

	<h1 class="legend" style="font-size: 30px;">Sistema de Gerenciamento de Iluminação Publica</h1>
		<form method="POST" action="">
			<div class="col-sm-12">
				<label>Numero do Protocolo</label>
				<input type="text" name="numProtocolo" class="form-control" placeholder="Digite aqui o numero de Protocolo a ser Pesquisado">
				<input type="submit" value="Pesquisar" class="btn btn-success" name="edtPesquisar">				
			</div>
		</form>

<?php
        if(isset($_POST['edtPesquisar'])){

            @$numProtocolo = $_POST['numProtocolo'];
            $buscarOcorrencia = $dtibd->executarQuery("select",	"SELECT * FROM ocorrencia where numeroProtocolo =  $numProtocolo");

            foreach ($buscarOcorrencia as $key) {
?>
            <div class="col-sm-12 bk" style="margin-top: 20px; padding: 20px">
                <div class="col-sm-3">
                    <label>Numero Protocolo</label><input type="text" value="<?php echo $key['numeroProtocolo']; ?>" name="edtnumeroProtocolo" class="form-control" readonly><br>
                </div>

                <div class="col-sm-3">
                    <label>Status</label><input type="text" value="<?php echo $key['status']; ?>" name="edtstatus" class="form-control" readonly><br>
                </div>

                <div class="col-sm-3">
                    <label>Data</label><input type="text" value="<?php echo $key['data']; ?>" name="edtdata" class="form-control" readonly><br>
                </div>

                <div class="col-sm-3">
                    <label>Prazo</label><input type="text" value="<?php echo $key['prazo']; ?>" name="edtprazo" class="form-control" readonly><br>
                </div>

                <div class="col-sm-4">
                    <label>Nome Municipe</label><input type="text" value="<?php echo $key['nomeMunicipe']; ?>" name="edtnomeMunicipe" class="form-control" readonly><br>
                </div>

                <div class="col-sm-4">
                    <label>Endereco</label><input type="text" value="<?php echo $key['enderecoMunicipe']; ?>" name="edtenderecoMunicipe" class="form-control" readonly><br>
                </div>

                <div class="col-sm-4">
                    <label>Descricao</label><input type="text" value="<?php echo $key['descricao']; ?>" name="edtdescricao" class="form-control" readonly>
                </div>
            </div>

<?php
            }
        }
?>

</div>

<?php } else { ?>

	<div class="col-sm-9"> 

	<h1 class="legend" style="font-size: 30px;">Sistema de Gerenciamento de Iluminação Publica</h1>
		<div class="col-sm-4" style="min-height: 300px;">
			<div class="box-relatorio">
				<legend class="legend">Grafico das Funcionalidades</legend>
				<a href="graficoDasFuncionalidades.php"><img src="graficoDasFuncionalidades.php" width="100%"></a>
			</div>
		</div>

		<div class="col-sm-4" style="min-height: 300px;">
			<div class="table-responsive box-relatorio">
				<table class="bk" width="100%" id="tabela">
					<legend class="legend">Ultimos Pontos Cadastrados</legend>
<?php
					$buscaProdutos = $dtibd->executarQuery("select","SELECT * FROM pontoiluminacao order by id desc Limit 5");
					foreach ((array) $buscaProdutos as $result) {
?>
                        <tr>
                            <td class="tdPers"><?php echo $result['logradouro']; ?></td>
                        </tr>
<?php
						}
?>
				</table>
			</div>
		</div>

		<div class="col-sm-4" style="min-height: 300px;">
			<div class="table-responsive box-relatorio">		
				<table class="bk" width="100%">
					<legend class="legend">Ultimos Usuarios Cadastrados</legend>
<?php
					$buscarUsuario = $dtibd->executarQuery("select","SELECT * FROM usuario order by id desc Limit 5");
					foreach ($buscarUsuario as $result) {	
?>

						<tr>
							<td class="tdPers"><?php echo $result['usuario']; ?></td>
						</tr>
<?php
						}
?>
				</table>
			</div>
		</div>

		<hr noshade="noshade">

		<div class="col-sm-4">
			<a href="graficopizza.php"><img src="graficopizza.php" style="width: 100%;"></a>
		</div>

		<div class="col-sm-4">
			<a href="graficoStatus.php"><img src="graficoStatus.php" style="width: 100%;"></a>
		</div>

		<div class="col-sm-4">
			<a href="graficoManutencao.php"><img src="graficoManutencao.php" style="width: 100%;"></a>
		</div>
	</div>
</div>

<?php } ?>